<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class RepairerController extends Controller
{
    public function ListRepairer(){
        $ListRepairer = DB::table('repairers')
                        -> join('service_types' , 'repairers.servicetype_id' , '=' , 'service_types.id')
                        -> select('repairers.*' , 'service_types.name as servicetype_name')
                        -> orderBy('id' , 'DESC')
                        -> get();
        return view('backend.list-repairer' , ['ListRepairer' => $ListRepairer]);
    }

    public function AddRepairer(){
        $ListService = DB::table('service_types')
                        -> orderBy('id' , 'DESC')
                        -> get();
        return view('backend.add-repairer' , ['ListService' => $ListService]);
    }
    
    public function AddRepairerSubmit(Request $request){
        $name = $request -> input('name');
        $servicetype = $request -> input('servicetype_id');

        $age = $request -> input('age');
        $phone = $request -> input('phone');
        $like_id = $request -> input('like_id');
        $facebook = $request -> input('facebook');
        $status = $request -> input('status');
        $image = $request -> file('image');
        $image_name = $image -> getClientOriginalName();
        $image -> move(public_path('backend/img/repairer') , $image_name);
        $email = $request -> input('email');
        $address = $request -> input('address');
        $detail = $request -> input('detail');
        $lat = $request -> input('lat');
        $lng = $request -> input('lng');
        $username = $request -> input('username');
        $password = $request -> input('password');
        $is_delete = $request -> input('is_delete');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        DB::table('repairers') -> insert([
            'name' => $name,
            'servicetype_id' => $servicetype,
            'age' => $age,
            'phone' => $phone,
            'like_id' => $like_id,
            'facebook' => $facebook,
            'status' => $status,
            'image' => $image_name,
            'email' => $email,
            'address' => $address,
            'detail' => $detail,
            'lat' => $lat,
            'lng' => $lng,
            'username' => $username,
            'password' => $password,
            'is_delete' => $is_delete,
            'created_at' => $created_at,
            'updated_at' => $updated_at

        ]);
        return redirect('admin/list-repairer');

    }
}

