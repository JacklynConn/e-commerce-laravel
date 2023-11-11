<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function ListService(){
        $ListService = DB::table('service_types')
                        -> orderBy('id' , 'DESC')
                        -> get();
        return view('backend.list-service' , ['ListService' => $ListService]);

    }
    public function AddService(){
        return view('backend.add-service');
    }
    public function AddServiceSubmit(Request $request){
        $name = $request->input('name');
        $icon_code = $request->input('icon_code');
        $status = $request->input('status');
        $Service = DB::table('service_types')
                ->insert([
                    'name' => $name,
                    'icon_code' => $icon_code,
                    'status' => $status,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                if($Service){
                    $postType     = 'service';
                    $productname  = $name;
                    $status        = 'Add';
                    $this->logActivity($postType , $productname , $status);
                    return redirect('/add-service')->with('message' , 'Add service success, Please views list');
        }
    }
    public function EditService($id){
        $EditService = DB::table('service_types')
                    ->where('id' , $id)
                    ->get();
        return view('backend.edit-service' ,['EditService' => $EditService]);
    }
    public function EditServiceSubmit( Request $request){
        $id    = $request->input('id');
        $name  = $request->input('name');
        $icon_code = $request->input('icon_code');
        $status = $request->input('status');
        $EditService = DB::table('service_types')
                    ->where('id' , $id)
                    ->update([
                        'name' => $name,
                        'icon_code' => $icon_code,
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
        if($EditService){
            return redirect('list-service');
        }
    }

    public function RemoveService($id){
        $RemoveService = DB::table('service_types')
                    ->where('id' , $id)
                    ->get();
        return view('backend.remove-service' , ['RemoveService' => $RemoveService]);
    }
    public function RemoveServiceSubmit(Request $request){
        $id = $request->input('id');
        $RemoveService = DB::table('service_types')
                    ->where('id' , $id)
                    ->delete();
        if($RemoveService){
            return redirect('list-service');
        }
    }
}
