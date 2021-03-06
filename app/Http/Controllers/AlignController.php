<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AlignController extends Controller
{
    public function align(request $request)
    {
      $email=$request->email;
      $goalid=$request->goalid;
      if ($email!=Auth::User()->email) {
        DB::table('goalalignment')->insert(
          [
            'goalid'=>$goalid,
            'email'=>$email,
            'useremail'=>Auth::User()->email,
          ]
        );

        DB::table('goal_registry')->insert(
          [
            'user_id'=>Auth::id(),
            'receiver_email'=>$email,
            'authorization'=>'aligned',
            'goalid'=>$goalid,
            'goalname'=>$request->goalname,
            'user_fname'=>Auth::User()->fname,
            'user_lname'=>Auth::User()->lname,
            'status'=>'notseen',
          ]
        );

        DB::table('notifications')->insert(
                [
                  'to'=> $email,
                  'subject' => 'Align',
                  'message'=> Auth::User()->fname.' '.Auth::User()->lname.' has aligned the goal"'.$request->goalname.'" with you',
                  'template_name'=>'aligns',
                  'message_type'=>1,
                ]
            );

          $user=DB::table('users')->where('email',$email)->get(['lname','fname','id','email','dob','phone','avatar']);
          echo json_encode($user);
          // echo "string";
          }
          else {
            echo json_encode("");
          }

          }



          // public function deletealigned(request $request)
          // {
          //   $useremail=$request->email;
          //   $goalid=$request->goalid;
          //   DB::table('goals')->where([['goalid',$goalid],['email',$useremail],['goalauthorization','aligned']])->delete();
          //   DB::table('tasks')->where([['goalid',$request->goalid],['email',$useremail],['taskauthorization','aligned']])->delete();
          //   DB::table('privacys')->where([['goalid',$request->goalid],['email',$useremail]])->delete();
          // }



          public function alignsearch(request $request)
          {
            $email=$request->email;
            $result=DB::table('users')->where('email','like', "%".$email."%")->get(['lname','fname','id','email','dob','phone','avatar']);

            function is_ajax_request() {
                return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
              }

            if (!is_ajax_request()) {
              # code...
            }

            echo json_encode($result);

          }


    }
