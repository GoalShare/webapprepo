<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goal;
use App\Task;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class commentController extends Controller
{
      public function post(Request $request){

        DB::table('comments')->insert(
                [
                  'userid'=> Auth::id(),
                  'goalid'=> $request->goalid,
                  'Commenteddate'=>Carbon::now(),
                  'commenttext'=> $request->comment,
                ]
            );
            $arr = array('name' => Auth::User()->fname, 'comment' => $request->comment, 'datetime' => Carbon::now()->toDayDateTimeString(), 'avatar' =>Auth::User()->avatar);
            echo json_encode($arr);

   }


 }
