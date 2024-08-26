<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Repairer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class RepairerController extends Controller
{
    public function ListRepairer()
    {
        $ListRepairer = DB::table('repairer')
            ->join('service_types', 'repairer.servicetype_id', '=', 'service_types.id')
            ->select('repairer.*', 'service_types.name as servicetype_name', 'service_types.id as servicetype_id')
            ->orderBy('id', 'ASC')
            ->get();
        return view('backend.list-repairer', ['ListRepairer' => $ListRepairer]);
    }

    public function AddRepairer()
    {
        $ListService = DB::table('service_types')
            ->orderBy('id', 'DESC')
            ->get();
        return view('backend.add-repairer', ['ListService' => $ListService]);
    }

    // add repairer submit
    public function AddRepairerSubmit(Request $request)
    {
        $name = $request->input('name');
        $sex = $request->input('sex');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $username = $request->input('username');
        $password = $request->input('password');
        $facebook = $request->input('facebook');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $servicetype_id = $request->input('servicetype_id');
        $details = $request->input('details');
        $file            = $request->file('image');
        $image       = rand(1, 999) . '-' . $file->getClientOriginalName();
        $path            = 'repairer';
        $file->move($path, $image);

        $addRepairer = DB::table('repairer')->insert([
            'name' => $name,
            'sex' => $sex,
            'age' => $age,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => Hash::make($password),
            'facebook' => $facebook,
            'lat' => $lat,
            'lng' => $lng,
            'servicetype_id' => $servicetype_id,
            'details' => $details,
            'image' => $image,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/add-repairer')->with('message', 'Add repairer success, Please views list');
    }

    public function EditRepairer($id)
    {
        $EditRepairer = DB::table('repairer')
            ->where('id', $id)
            ->get();
        $ListService = DB::table('service_types')
            ->orderBy('id', 'DESC')
            ->get();
        return view('backend.edit-repairer', ['EditRepairer' => $EditRepairer, 'ListService' => $ListService]);
    }

    // edit repairer submit
    public function EditRepairerSubmit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $sex = $request->input('sex');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $username = $request->input('username');
        $password = $request->input('password');
        $facebook = $request->input('facebook');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $servicetype_id = $request->input('servicetype_id');
        $details = $request->input('details');
        $file            = $request->file('image');
        $image       = rand(1, 999) . '-' . $file->getClientOriginalName();
        $path            = 'repairer';
        $file->move($path, $image);

        $EditRepairer = DB::table('repairer')->where('id', $id)->update([
            'name' => $name,
            'sex' => $sex,
            'age' => $age,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'username' => $username,
            'password' => Hash::make($password),
            'facebook' => $facebook,
            'lat' => $lat,
            'lng' => $lng,
            'servicetype_id' => $servicetype_id,
            'details' => $details,
            'image' => $image,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('list-repairer');
    }

    public function RemoveRepairer($id)
    {
        $RemoveRepairer = DB::table('repairer')
            ->where('id', $id)
            ->get();
        return view('backend.remove-repairer', ['RemoveRepairer' => $RemoveRepairer]);
    }

    public function RemoveRepairerSubmit(Request $request)
    {
        $id = $request->input('id');
        $RemoveRepairer = DB::table('repairer')
            ->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        if ($RemoveRepairer) {
            return redirect('list-repairer');
        }
    }
}
