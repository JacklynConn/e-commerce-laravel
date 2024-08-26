<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Repairer;

class IndexController extends Controller
{
    //
    private function distance($lat1, $lon1, $lat2, $lon2)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }


    public function service()
    {
        $serviceType = ServiceType::where('status', 1)->get();
        return json_encode($serviceType);
    }

    public function fnRepairer(Request $req)
    {
        $serviceTypeId = $req->service_id;
        $lat1 = $req->latitude;
        $lng1 = $req->longitude;

        $repairer = Repairer::where("servicetype_id", $serviceTypeId)->get();
        $newRepairer = [];
        for ($i = 0; $i < count($repairer); $i++) {
            $distance = $this->distance($lat1, $lng1, $repairer[$i]['lat'], $repairer[$i]['lng']);
            $repairer[$i]['distance'] = 2;
            if ($repairer[$i]['distance'] <= 10) {
                $newRepairer[$i] = $repairer[$i];
            }
        }
        return json_encode($newRepairer);
    }

    public function fnRegister(Request $req)
    {
        $register = new Customer();
        $register->phone = $req->phone;
        $register->save();

        return response()->json(['message' => 'Phone number stored successfully']);
    }
}
