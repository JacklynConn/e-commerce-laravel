<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{

// list product
    public function ListProduct(Request $request ){
        
        $countProduct = DB::table('product')
                    ->count('id');
        $LimitperPage  = 5 ;
        $currentPage   = $request->page;
        $TotalPage     = ceil($countProduct / $LimitperPage);
        $offset        = (   $currentPage   - 1) * $LimitperPage;
       
     
            $Product = DB::table('product')
                    ->join('category' , 'product.category_id' , '=' , 'category.id')
                    ->join('users' , 'product.author' , '=' , 'users.id')
                    ->select('product.*' , 'category.name AS cate_name' , 'users.name AS author_name' ,'sale-price AS sale_price')
                    ->orderBy('product.id' , 'DESC')
                    ->offset($offset)
                    ->limit($LimitperPage)
                    ->get();
    
        return view('backend.list-product' , ['Product'=>$Product] , ['countProduct'=>$countProduct , 'TotalPage'=>$TotalPage ,'currentPage' =>$currentPage , 'LimitperPage'=>$LimitperPage  ] );
        
    }
    // add product
    public function AddProduct(){
        $ListCategory = DB::table('category')
                    ->orderBy('id' , 'DESC')
                    ->get();
        return view('backend.add-product' , ['ListCategory'=>$ListCategory]);
    }

    public function AddProductSubmit(Request $request){
        $name            = $request->input('name');
        $qty             = $request->input('qty');
        $regular_price   = $request->input('regular_price');
        $sale_price      = $request->input('sale_price');
        $category        = $request->input('category');
        $file            = $request->file('thumbnail');
        $thumbnail       = rand(1,999).'-'.$file->getClientOriginalName();
        $path            = 'uploads';
        $file->move($path , $thumbnail);

        $size            = implode(', ' , $request->input('size'));
        $color           = implode(', ' , $request->input('color'));
        $description     = $request->input('description');
        // $isEdited = true;

        $Product = DB::table('product')->insert([
            'name'           => $name,
            'qty'            => $qty,
            'regular_price'  => $regular_price,
            'sale-price'     => $sale_price,
            'category_id'    => $category,
            'color'          => $color,
            'size'           => $size,
            'author'         => Auth::user()->id,
            'wiewer'         => '0',
            'description'    => $description,
            //  'created_at'     => date('Y-m-d H:m:s') ,
            // 'updated_at'     => date('Y-m-d H:m:s'),
            'thumbnail'      => $thumbnail
             
        ]);
        if($Product){
            $postType     = 'product';
            $productName  = $name;
            $status       = 'add';
            $this->logActivity($postType , $productName , $status);
            return redirect('admin/add-product')->with('message', 'add product success , please check views product');
            
        }
    }

    // ViewProduct
    public function ViewProduct($id){
        $ViewProduct = DB::table('product')
            ->join('category' , 'product.category_id' , '=' , 'category.id')
            ->join('users' , 'product.author' , '=' , 'users.id')
            ->select('product.*' , 'category.name AS cate_name' , 'users.name AS author_name' ,'sale-price AS sale_price')
            ->where('product.id' , $id)
            ->get();
        return view('backend.view-product' , ['ViewProduct'=>$ViewProduct]);
    }


 // $Edit 
    public function EditProduct($id){
       
        $EditProduct = DB::table('product')
                  
                    ->join('category' , 'product.category_id' , '=' , 'category.id')
                    ->join('users' , 'product.author' , '=' , 'users.id')
                    ->select('product.*' , 'category.name AS cate_name' , 'users.name AS author_name' ,'sale-price AS sale_price')
                    
                    ->where('product.id' , $id)                    
                    ->get();

                    $ListCategory = DB::table('category')
                     ->where('id' ,'<>', 'id')
                    ->get();

                   

        
        return view('backend.edit-product' , ['EditProduct'=>$EditProduct] , ['ListCategory'=>$ListCategory]);
    }

    public function EditProductSubmit(Request $request){
        $id             = $request->input('id');
        $name            = $request->input('name');
        $qty             = $request->input('qty');
        $regular_price   = $request->input('regular_price');
        $sale_price      = $request->input('sale_price');
        $category        = $request->input('category');
        
        $file            = $request->file('thumbnail');
        $thumbnail       = rand(1,999).'-'.$file->getClientOriginalName();
        $path            = 'uploads';
        $file->move($path , $thumbnail);
     //    $tmp            = $request->input('tmp');
 
        $size            = implode(', ' , $request->input('size'));
        $color           = implode(', ' , $request->input('color'));
       
        $description     = $request->input('description');

        
         $EditProduct = DB::table('product')
                     ->where('id' , $id)
                     ->update([
                         'name'            => $name,
                         'qty'             => $qty,
                         'regular_price'   => $regular_price,
                         'sale-price'      => $sale_price,
                         'category_id'     => $category,
                         'color'           => $color,
                         'size'            => $size,
                         'author'         => Auth::user()->id,
                         'wiewer'         => '0',
                         'description'    => $description,
                         'created_at'     => date('Y-m-d H:m:s') ,
                         'updated_at'     => date('Y-m-d H:m:s'),
                         'thumbnail'      => $thumbnail
                     ]);
         if($EditProduct){
             $postType     = 'product';
             $productName  = $name;
             $status       = 'update';
             $this->logActivity($postType , $productName , $status);
             return redirect('admin/list-product');
         }
 
     }



 

    // remove
    public function RemoveProduct($id){

        $Removeproduct = DB::table('product')
        ->where('id',$id)
        ->get();
        return view('backend.remove-product' , ['Removeproduct'=>$Removeproduct]);
    }

    public function RemoveProductSubmit(Request $request){
        
        $Removeproduct = DB::table('product')
        ->where('id', $request->id)
        ->delete();

        if($Removeproduct){
            $postType     = 'product';
            $productName  = $request->input('name');
            $status       = 'remove';
            $this->logActivity($postType , $productName , $status);
            return redirect('admin/list-product');
        }

    }

}
