<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function ListActivity($page){

        $ActivityCount = DB::table('activity_log')
                            ->count();
        $LimitPerPage  = 9;
        $TotalPage     = ceil($ActivityCount / $LimitPerPage);
        $offset        = ($page - 1) * $LimitPerPage;

        $ListActivity  = DB::table('activity_log')
                            ->orderBy('id' , 'DESC')
                            ->limit($LimitPerPage)
                            ->offset($offset)
                            ->get();
       

        return view('backend.list-activity' , ['ListActivity'=>$ListActivity , 'ActivityCount'=>$ActivityCount , 'TotalPage'=>$TotalPage , 'page'=>$page ]);
        // 
    }


    // search

    public function search(Request $request){
        $searchValue = $request->input('q');

        $Activity    = DB::table('activity_log')
        // ->join('users' , 'activity_log.id' , '=' , 'users.id')
        // ->select('activity_log.*','users.name AS Uauthor')            
                    ->where(strtoupper('author') , 'LIKE' , '%'.strtoupper($searchValue).'%')
                    ->orderBy('id' , 'DESC')
                    ->get();

                return view('backend.search-activity' , ['Activity'=>$Activity , 'searchValue'=>$searchValue]);

    }
}
