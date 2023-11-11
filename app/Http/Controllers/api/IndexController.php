<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Repairer;
class IndexController extends Controller
{
    //
    public function service(){
        $serviceType = ServiceType::where('status', 1)->get();
        return json_encode($serviceType);
    }
    public function fnRepairer(Request $req){
        $serviceTypeId =$req->service_id;
        $repairer = Repairer::where("servicetype_id",$serviceTypeId)->get();
        return json_encode($repairer);
    }
}
