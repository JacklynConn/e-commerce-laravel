<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function logActivity($postType , $servicename , $status){
        $user = Auth::user()->name;
        DB::table('activity_log')->insert([
            'author'         => $user,
            'service_name'   => $servicename,
            'status'         => $status,
            'postType'       => $postType,
            'created_at'     => date('Y-m-d H:m:s') ,
            'updated_at'     => date('Y-m-d H:m:s'),
        ]);
    }
}
