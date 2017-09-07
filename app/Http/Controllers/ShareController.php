<?php

namespace App\Http\Controllers;
use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShareController extends Controller
{
    public function share(request $request){
      $email=Auth::User()->email;
      if($request->email!=$email){
      $user=DB::table('users')->where('email',$request->email)->get();
      $goal=DB::table('goals')->where([['goalid',$request->goalid],['email',$email]])->get();
      $task=DB::table('tasks')->where([['goalid',$request->goalid],['email',$email]])->get();
      foreach ($goal as $goals) {
        DB::table('goals')->insert(
                [
                  'goalid'=> $request->goalid,
                  'email'=> $request->email,
                  'goalname' => $goals->goalname,
                  'goalintent' => $goals->goalintent,
                  'goalpriority' => $goals->goalpriority,
                  'goalcategory' => $goals->goalcategory,
                  'goalstartdate' => $goals->goalstartdate,
                  'goalenddate' => $goals->goalenddate,
                  'goalauthorization' => 'gift',
                  'goalpictureone'=>$goals->goalpictureone,
                  'goalpicturetwo'=>$goals->goalpicturetwo,
                  'pinned'=>1,
                  'created_at'=>Carbon::now(),
                  'color'=> '0'.rand(0,99),
                ]
            );
            DB::table('goal_registry')->insert(
                    [
                      'user_id'=> Auth::id(),
                      'receiver_email'=>$request->email,
                      'authorization'=>'shared',
                      'user_fname'=>Auth::User()->fname,
                      'user_lname'=>Auth::User()->lname,
                      'goalname'=>$goals->goalname,
                      'goalid'=>$goals->goalid,
                    ]
                );
                DB::table('privacys')->insert(
                        [
                          'goalid'=> $request->goalid,
                          'email'=> $request->email,
                          'goalauthorization'=>'gift',
                          'created_at'=>Carbon::now(),
                        ]
                    );
      }
      foreach ($task as $tasks) {
        DB::table('tasks')->insert(
                [
                  'goalid'=> $request->goalid,
                  'email'=> $request->email,
                  'taskname' => $tasks->taskname,
                  'taskintent' => $tasks->taskintent,
                  'taskpriority' => $tasks->taskpriority,
                  'taskstartdate' => $tasks->taskstartdate,
                  'taskenddate' => $tasks->taskenddate,
                  'taskauthorization' => 'gift',
                  'created_at'=> Carbon::now(),
                ]
            );
            // echo "done";
            $goal=Goal::find($request->goalid);
            $goal->gottasks=1;
            $goal->save();

      }
            return redirect('/goal/'.$request->goalid);



          }
          else {
            return redirect('/goal/'.$request->goalid);
          }
          }
}
