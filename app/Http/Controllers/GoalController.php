<?php

namespace App\Http\Controllers;
use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class GoalController extends Controller{


public function view($goalid){
  if(Auth::check()){
    $id = Auth::id();
    $user=DB::table('users')->where('id',$id)->get();
    foreach ($user as $users) {
      $email=$users->email;
    }
    $categorylist = DB::table('goals')
    ->select('goalcategory')
    ->where('email', $email)
    ->groupBy('goalcategory')
    ->get();
    $friends=DB::table('friendships')
                   ->join('users', 'users.id', '=', 'friendships.user')
                   ->select('users.*', 'friendships.*')
                   ->where([['friendships.status','friends'],['friendships.friend',$id]])
                   ->get();
   $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
   $friendstwos=DB::table('friendships')
                  ->join('users', 'users.id', '=', 'friendships.friend')
                  ->select('users.*', 'friendships.*')
                  ->where([['friendships.status','friends'],['friendships.user',$id]])
                  ->get();
    $friendrequest=DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user')
            ->select('users.*', 'friendships.*')
            ->where([['friendships.status','requested'],['friendships.friend',$id]])
            ->get();
    $userskill=DB::table('userskills')->where('email',$email)->get();
    $goalskill=DB::table('goalskills')->where('goalid',$goalid)->get();
    $creator=DB::table('goals')
            ->join('users', 'users.email', '=', 'goals.email')
            ->select('users.*', 'goals.goalauthorization')
            ->where([['goals.goalid',$goalid],['goals.goalauthorization','creator']])
            ->get();
    $privacy=DB::table('privacys')->where([['goalid',$goalid],['email',$email]])->get();
    $goal = DB::table('goals')->where([['goalid',$goalid],['email',$email]])->get();
    $task = DB::table('tasks')->where([['goalid',$goalid],['taskauthorization','<>','gift']])->orderBy('id', 'asc')->get();
    $aligned=DB::table('goals')->join('users','users.email','=','goals.email')->select('users.*')->where([['goals.goalid',$goalid],['goals.goalauthorization','aligned']])->get();
    $shared=DB::table('goals')->join('users','users.email','=','goals.email')->select('users.*')->where([['goals.goalid',$goalid],['goals.goalauthorization','gift']])->get();

    $comment = DB::table('comments')->join('users','users.id','=','comments.userid')->select ('users.*','comments.*')->where('comments.goalid',$goalid)->orderBy('Commenteddate', 'desc')->get();
      $allemail=DB::table('users')->pluck('email');
    return view('goal',['goal'=>$goal,'task'=>$task,'notification'=>$notification,'user'=>$user,'privacy'=>$privacy,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'shared'=>$shared,'creator'=>$creator,
    'aligned'=>$aligned,'userskill'=>$userskill,'goalskill'=>$goalskill,'friends'=>$friends,'friendstwos'=>$friendstwos,'comment'=>$comment,'allemail'=>$allemail]);
}
  else {
    return view('auth.login');
  }
}

public function post(request $request){
  $email=Auth::user()->email;
  $control=$request->action;
  switch ($control) {
    case 'updategoal':
      $formgoal=$request->attribute;
      switch ($request->attribute) {
        case 'goalintent':
        if($request->goalintent == '')
          {
            echo $request->goalintent;
          }
        else {
          DB::table('goals')
                    ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                    ->update(['goalintent' => $request->goalintent]);
                    echo $request->goalintent;
        }
          break;
          case 'goalcategory':
          if($request->goalcategory == '')
            {
              echo $request->goalcategory;
            }
          else {
            DB::table('goals')
                      ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                      ->update(['goalcategory' => $request->goalcategory]);
                      echo $request->goalcategory;
          }
            break;
            case 'goalpriority':
            if($request->goalpriority == '')
              {
                echo $request->goalpriority;
              }
            else {
              DB::table('goals')
                        ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                        ->update(['goalpriority' => $request->goalpriority]);
                        echo $request->goalpriority;
            }
              break;
              case 'goalstartdate':
              if($request->goalstartdate == '')
                {
                  echo $request->goalstartdate;
                }
              else {
                DB::table('goals')
                          ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                          ->update(['goalstartdate' => $request->goalstartdate]);
                          echo $request->goalstartdate;
              }
                break;
                case 'goalenddate':
                if($request->goalenddate == '')
                  {
                    echo $request->goalenddate;
                  }
                else {
                  DB::table('goals')
                            ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                            ->update(['goalenddate' => $request->goalenddate]);
                            echo $request->goalenddate;
                }
                break;

        default:
          # code...
          break;
      }
      break;
    case 'addtask':
      if($request->goalauthorization=='creator') {
          DB::table('tasks')->insert(
                  [
                    'goalid'=> $request->goalid,
                    'email'=> $email,
                    'taskname' => $request->taskname,
                    'taskintent' => $request->taskintent,
                    'taskpriority' => $request->taskpriority,
                    'taskstartdate' => $request->taskstartdate,
                    'taskenddate' => $request->taskenddate,
                    'taskauthorization' => 'creator',
                    'created_at'=> Carbon::now(),
                  ]
              );
              // echo "done";
              $goal=Goal::find($request->goalid);
              $goal->gottasks=1;
              $goal->save();
              return redirect('/goal/'.$request->goalid);


            }
      elseif ($request->goalauthorization=='gift') {
        DB::table('tasks')->insert(
                [
                  'goalid'=> $request->goalid,
                  'email'=> $email,
                  'taskname' => $request->taskname,
                  'taskintent' => $request->taskintent,
                  'taskpriority' => $request->taskpriority,
                  'taskstartdate' => $request->taskstartdate,
                  'taskenddate' => $request->taskenddate,
                  'taskauthorization' => 'creator',
                  'created_at'=> Carbon::now(),
                ]
            );
            $goal=App\Goal::find($request->goalid);
            $goal->gottasks=1;
            $goal->save();
        echo "done";
      }
      else {
        echo "cannot";
      }

      break;
      case 'updateprivacy':
        switch ($request->attribute) {
          case 'goalintentprivacy':
          if ($request->goalintentprivacy=='') {
            DB::table('privacys')
                      ->where([['goalid', $request->goalid],['email',$email]])
                      ->update(['goalintentprivacy' => 'public']);
                      echo "$request->goalintentprivacy";
          }
          if ($request->goalintentprivacy=='private'){
            DB::table('privacys')
                      ->where([['goalid', $request->goalid],['email',$email]])
                      ->update(['goalintentprivacy' => 'private']);
                      echo "$request->goalintentprivacy";
          }

            break;
            case 'goalpriorityprivacy':
            if ($request->goalpriorityprivacy=='') {
              DB::table('privacys')
                        ->where([['goalid', $request->goalid],['email',$email]])
                        ->update(['goalpriorityprivacy' => 'public']);
                        echo "$request->goalpriorityprivacy";
            }
            if ($request->goalpriorityprivacy=='private'){
              DB::table('privacys')
                        ->where([['goalid', $request->goalid],['email',$email]])
                        ->update(['goalpriorityprivacy' => 'private']);
                        echo "$request->goalpriorityprivacy";
            }

              break;
              case 'goalcategoryprivacy':
              if ($request->goalcategoryprivacy=='') {
                DB::table('privacys')
                          ->where([['goalid', $request->goalid],['email',$email]])
                          ->update(['goalcategoryprivacy' => 'public']);
                          echo "$request->goalcategoryprivacy";
              }
              if ($request->goalcategoryprivacy=='private'){
                DB::table('privacys')
                          ->where([['goalid', $request->goalid],['email',$email]])
                          ->update(['goalcategoryprivacy' => 'private']);
                          echo "$request->goalcategoryprivacy";
              }

                break;
                case 'goalstartdateprivacy':
                if ($request->goalstartdateprivacy=='') {
                  DB::table('privacys')
                            ->where([['goalid', $request->goalid],['email',$email]])
                            ->update(['goalstartdateprivacy' => 'public']);
                            echo "$request->goalstartdateprivacy";
                }
                if ($request->goalstartdateprivacy=='private'){
                  DB::table('privacys')
                            ->where([['goalid', $request->goalid],['email',$email]])
                            ->update(['goalstartdateprivacy' => 'private']);
                            echo "$request->goalstartdateprivacy";
                }

                  break;
                  case 'goalenddateprivacy':
                  if ($request->goalenddateprivacy=='') {
                    DB::table('privacys')
                              ->where([['goalid', $request->goalid],['email',$email]])
                              ->update(['goalenddateprivacy' => 'public']);
                              echo "$request->goalenddateprivacy";
                  }
                  if ($request->goalenddateprivacy=='private'){
                    DB::table('privacys')
                              ->where([['goalid', $request->goalid],['email',$email]])
                              ->update(['goalenddateprivacy' => 'private']);
                              echo "$request->goalenddateprivacy";
                  }

                    break;
                    case 'goalcompletedpercentageprivacy':
                    if ($request->goalcompletedpercentageprivacy=='') {
                      DB::table('privacys')
                                ->where([['goalid', $request->goalid],['email',$email]])
                                ->update(['goalcompletedpercentageprivacy' => 'public']);
                                echo "$request->goalcompletedpercentageprivacy";
                    }
                    if ($request->goalcompletedpercentageprivacy=='private'){
                      DB::table('privacys')
                                ->where([['goalid', $request->goalid],['email',$email]])
                                ->update(['goalcompletedpercentageprivacy' => 'private']);
                                echo "$request->goalcompletedpercentageprivacy";
                    }
                      break;
                      case 'addtaskprivacy':
                      if ($request->addtaskprivacy=='') {
                        DB::table('privacys')
                                  ->where([['goalid', $request->goalid],['email',$email]])
                                  ->update(['addtaskprivacy' => 'public']);
                                  echo "$request->addtaskprivacy";
                      }
                      if ($request->addtaskprivacy=='private'){
                        DB::table('privacys')
                                  ->where([['goalid', $request->goalid],['email',$email]])
                                  ->update(['addtaskprivacy' => 'private']);
                                  echo "$request->addtaskprivacy";
                      }
                        break;
                        case 'canshareprivacy':
                        if ($request->canshareprivacy=='') {
                          DB::table('privacys')
                                    ->where([['goalid', $request->goalid],['email',$email]])
                                    ->update(['canshareprivacy' => 'public']);
                                    echo "$request->canshareprivacy";
                        }
                        if ($request->canshareprivacy=='private'){
                          DB::table('privacys')
                                    ->where([['goalid', $request->goalid],['email',$email]])
                                    ->update(['canshareprivacy' => 'private']);
                                    echo "$request->canshareprivacy";
                        }
                          break;
          default:
            # code...
            break;
        }
        break;
        case 'updatecp':
          $task = DB::table('tasks')->where([['goalid',$request->goalid],['taskauthorization','<>','gift']])->get();
          $goal = DB::table('goals')->where([['goalid',$request->goalid],['goalauthorization','<>','gift']])->get();
          $tcpt=0;
          foreach ($task as $tasks) {
            if ($tasks->id!=$request->taskid) {
              $tcpt=$tcpt+$tasks->taskcompletedpercentage;
            }
          }
          $gcp=(($tcpt+$request->cpinput)/(count($task)*100))*100;

          $tsk=Task::find($request->taskid);
          $tsk->taskcompletedpercentage=$request->cpinput;
          $tsk->save();

          DB::table('goals')
                    ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
                    ->update(['goalcompletedpercentage' => round($gcp,2)]);
          // echo round($gcp,2);
          return redirect('/goal/'.$request->goalid);
          break;
    default:
      # code...
      break;
  }



}

public function deletetask(request $request)
{
  DB::table('tasks')->where([['id',$request->taskid],['taskauthorization','<>','gift']])->delete();
  return redirect('/goal/'.$request->goalid);
}

public function upateGoalPic(request $request){
   if($request->hasfile('goalpicture')){
       $file = $request->file('goalpicture');
       if($file->getClientOriginalExtension()=='jpg' ||$file->getClientOriginalExtension()=='jpeg' ){
               $filename=time().'1.'.$file->getClientOriginalExtension();
                $filenamethumb=time().'2.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->opacity(50)->save(public_path('uploads/goals/'. $filenamethumb ));
                Image::make($file)->resize(1142,400)->opacity(50)->save(public_path('uploads/goals/'. $filename ));


                    DB::table('goals')
            ->where('goalid',  $request->goalid)
            ->whereIn('goalauthorization', ['creator', 'aligned'])
            ->update([ 'goalpictureone'=>$filename, 'goalpicturetwo'=>$filenamethumb]);


                    return redirect('/goal/'.$request->goalid);
              }



          }
          else {
            return redirect('/goal/'.$request->goalid);
          }
       }

       public function updatetask(request $request){


  DB::table('tasks')
            ->where('id', $request->id)
            ->update(['taskintent' => $request->taskintent,'taskpriority' => $request->taskpriority,'taskstartdate' => $request->taskstartdate,'taskenddate' => $request->taskenddate]);

            return redirect('/goal/'.$request->goalid);




  }








}
