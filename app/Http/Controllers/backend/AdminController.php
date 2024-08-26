<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('backend.master');
    }

    // sign in
    public function signin(){
        return view('backend.login');
    }
    public function signinSubmit(Request $request){
        $email_name   = $request->input('email_name');
        $password     = $request->input(('password'));
        $remember     = $request->input('remember');
        if(Auth::attempt(['email' => $email_name, 'password' => $password] , $remember)){
         return redirect('/');
        }elseif (Auth::attempt(['name' => $email_name , 'password' => $password] , $remember)){
         return redirect('/');
        }else{
         return redirect('signin')->with('message' , 'Invalid Credentail!');
        }
     }

        // sign up
        public function signup(){
            return view('backend.register');
        }



        // sign up submit
        public function signupSubmit(Request $request){
            $name      = $request->input('name');
            $email     = $request->input('email');
            $password  = $request->input('password');
            $isEdited ="";

            if(!empty($name) && !empty($email) && !empty($password)){
                $file      = $request->file('profile');
                if(empty($file)){
                    $images    = 'https://th.bing.com/th/id/OIP.xo-BCC1ZKFpLL65D93eHcgHaGe?w=231&h=202&c=7&r=0&o=5&pid=1.7" alt class="w-px-40 h-auto rounded-circle';
                    
                }else{
                    $images    = rand(1,999).'-'.$file->getClientOriginalName();
                    $path      = 'uploads';
                    $file->move($path,$images);
                }
                

                $objUser   =DB::table('users')->insert([
                    'name'     => $name,
                    'email'    => $email,
                    'password' => Hash::make($password),
                    'profile'  => $images,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if($objUser){
                    return redirect('signin');
                }else{
                    return redirect('signup')->with('message' , 'Please input your informations');
                }
            }else{
                return redirect('signup')->with('message' , 'Please input your informations!');
            }
            
        }

        // UserLogout
        public function UserLogout(){
            $objLogout = Auth::logout();
            if(empty($objLogout)){
                return redirect('signin');
            }
        }
         /*
     @website Logo
    */

    // list logo
    public function ListLogo(){
        $objLogo=DB::table('website_logo')
                        // ->count(),
                        ->orderBy('id' , 'DESC')
                        ->get();

        $countLogo =DB::table('website_logo')
                        ->count('id');

        return view('backend.list-logo' , ['objLogo' => $objLogo , 'countLogo'=>$countLogo ]);
    }
    
    // @Add Logo
    public function addLogo(){
        return view('backend.add-logo');
    }
    // add logo submit
    public function addLogoSubmit(Request $request){
        $file = $request->file('thumbnail');
        $thumbnail     = rand(1,999).'-'.$file->getClientOriginalName();
        $path      = 'uploads';
        $file->move($path , $thumbnail);

        $objLogo = DB::table('website_logo')->insert([
            'thumbnail' => $thumbnail,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if($objLogo){
            $postType     = 'Logo';
            $productName  = 'logo';
            $status       = 'add';
            $this->logActivity($postType , $productName , $status);
            return redirect('admin/add-logo')->with('message', 'Add logo success. please check View post');
        }
    }

    // edit logo
    public function EditLogo($id){
        $objLogo = DB::table('website_logo')
                    ->where('id' , $id)
                    ->get();
        return view('backend.edit-logo' , ['objLogo' => $objLogo]);
    }

    public function EditLogoSubmit(Request $request){
        $file    = $request->file('thumbnail');
        $thumbnail=rand(1,999).'-'.$file->getClientOriginalName();
        $file->move('uploads' , $thumbnail);

        $objLogo =DB::table('website_logo')
                        ->where('id' , $request->id)
                        ->update([
                            'thumbnail'=>$thumbnail,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                        if($objLogo){
                            $postType     = 'Logo';
                            $productName  = 'logo';
                            $status       = 'update';
                            $this->logActivity($postType , $productName , $status);
                            return redirect('admin/list-logo');
                        }
    }


    // remove logo
    public function RemoveLogo($id){
        $objLogo = DB::table('website_logo')
        ->where('id' , $id)
        ->get();
    return view('backend.remove-logo' , ['objLogo' => $objLogo]);
    }

    public function RemoveLogoSubmit(Request $request){
       $objLogo = DB::table('website_logo')
                    ->where('id' , $request->id)
                    ->delete();
                    if($objLogo){
                        $postType     = 'Logo';
                        $productName  = 'logo';
                        $status       = 'remove';
                        $this->logActivity($postType , $productName , $status);
                        return redirect('admin/list-logo');
                    }
    }
}
