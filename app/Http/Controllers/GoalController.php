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
    $email='';
    $id = Auth::id();
    $emails=DB::table('goals')->where('goalid',$goalid)->pluck('email');
    $alignmentemail=DB::table('goalalignment')->where([['email',Auth::User()->email],['goalid',$goalid]])->value('useremail');
    foreach ($emails as $emaillist) {
      if ($emaillist==Auth::User()->email) {
        $email=$emaillist;
      }
      else {
        $email=$alignmentemail;
      }
    }
    $categorylist = DB::table('goals')
    ->select('goalcategory')
    ->where('email', Auth::User()->email)
    ->groupBy('goalcategory')
    ->get();
    $friends=DB::table('friendships')
                   ->join('users','users.id', '=', 'friendships.user')
                   ->select('users.*', 'friendships.*')
                   ->where([['friendships.status','friends'],['friendships.friend',$id]])
                   ->get();
   $notification=DB::table('goal_registry')->where('receiver_email',Auth::User()->email)->get();
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
    $userskill=DB::table('userskills')->where('email',Auth::User()->email)->get();
    $goalskill=DB::table('goalskills')->where('goalid',$goalid)->get();
    $creator=DB::table('goals')
            ->join('users', 'users.email', '=', 'goals.email')
            ->select('users.*', 'goals.goalauthorization')
            ->where([['goals.goalid',$goalid],['goals.goalauthorization','creator']])
            ->get();
    $privacy=DB::table('privacys')->where([['goalid',$goalid],['email',$email]])->get();
    $brag=DB::table('brag')->where([['goalid',$goalid],['email',$email]])->get();
    $goal = DB::table('goals')->where([['goalid',$goalid],['email',$email]])->get();
    $task = DB::table('tasks')->where('goalid',$goalid)->orderBy('id', 'asc')->get();
    $aligned=DB::table('goalalignment')->join('users','users.email','=','goalalignment.email')->select('users.*')->where('goalalignment.goalid',$goalid)->get();
    $shared=DB::table('goals')->join('users','users.email','=','goals.email')->select('users.*')->where([['goals.goalid',$goalid],['goals.goalauthorization','gift']])->get();
    $likesanddislikes=DB::table('likes')->where('goalid',$goalid)->get();
    $comment = DB::table('comments')->join('users','users.id','=','comments.userid')->select ('users.*','comments.*')->where('comments.goalid',$goalid)->orderBy('Commenteddate', 'desc')->get();
    $allemail=DB::table('users')->pluck('email');
    $asigned=DB::table('taskasign')
            ->join('tasks','tasks.id','=','taskasign.taskid')
            ->select('taskasign.*')
            ->where('tasks.goalid',$goalid)
            ->get();
    return view('test',['goal'=>$goal,'task'=>$task,'notification'=>$notification,'privacy'=>$privacy,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'shared'=>$shared,'creator'=>$creator,
    'aligned'=>$aligned,'email'=>$email,'asigned'=>$asigned,'userskill'=>$userskill,'goalskill'=>$goalskill,'friends'=>$friends,'friendstwos'=>$friendstwos,'comment'=>$comment,'likesanddislikes'=>$likesanddislikes,'allemail'=>$allemail]);
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
                    'email'=> $request->email,
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
              DB::table('goals')
                        ->where([['goalid', $request->goalid],['email',$request->email]])
                        ->update(['gottasks' => 1]);
              return redirect('/goal/'.$request->goalid);


            }
      elseif ($request->goalauthorization=='gift') {
        DB::table('tasks')->insert(
                [
                  'goalid'=> $request->goalid,
                  'email'=> $request->email,
                  'taskname' => $request->taskname,
                  'taskintent' => $request->taskintent,
                  'taskpriority' => $request->taskpriority,
                  'taskstartdate' => $request->taskstartdate,
                  'taskenddate' => $request->taskenddate,
                  'taskauthorization' => 'creator',
                  'created_at'=> Carbon::now(),
                ]
            );
            DB::table('goals')
                      ->where([['goalid', $request->goalid],['email',$request->email]])
                      ->update(['gottasks' => 1]);
        echo "done";
      }
      else {
        echo "cannot";
      }

      break;
      case 'updateprivacy':
        switch ($request->attribute) {
          case 'hidegoalprivacy':
            if ($request->hidegoalprivacy=='') {
              DB::table('privacys')
                        ->where([['goalid', $request->goalid],['email',$email]])
                        ->update(['hidegoalprivacy' => 'public']);
                        echo "$request->hidegoalprivacy";
            }
            if ($request->hidegoalprivacy=='private'){
              DB::table('privacys')
                        ->where([['goalid', $request->goalid],['email',$email]])
                        ->update(['hidegoalprivacy' => 'private']);
                        echo "$request->hidegoalprivacy";
            }
              break;
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
                        case 'overridetaskprivacy':
                        if ($request->overridetaskprivacy=='') {
                          DB::table('privacys')
                                    ->where([['goalid', $request->goalid],['email',$email]])
                                    ->update(['overridetaskprivacy' => 'public']);
                                    echo "$request->overridetaskprivacy";
                        }
                        if ($request->overridetaskprivacy=='private'){
                          DB::table('privacys')
                                    ->where([['goalid', $request->goalid],['email',$email]])
                                    ->update(['overridetaskprivacy' => 'private']);
                                    echo "$request->overridetaskprivacy";
                        }
                          break;
                          case 'allowcommitprivacy':
                          if ($request->allowcommitprivacy=='') {
                            DB::table('privacys')
                                      ->where([['goalid', $request->goalid],['email',$email]])
                                      ->update(['allowcommitprivacy' => 'public']);
                                      echo "nice";
                          }
                          if ($request->allowcommitprivacy=='private'){
                            DB::table('privacys')
                                      ->where([['goalid', $request->goalid],['email',$email]])
                                      ->update(['allowcommitprivacy' => 'private']);
                                      echo $request->allowcommitprivacy;
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
  $task = DB::table('tasks')->where([['goalid',$request->goalid],['taskauthorization','<>','gift']])->get();
  $tcpt=0;
  foreach ($task as $tasks) {
    if ($tasks->id!=$request->id) {
      $tcpt=$tcpt+$tasks->taskcompletedpercentage;
    }
  }
  $gcp=(($tcpt+0)/(count($task)*100))*100;
  DB::table('goals')
            ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
            ->update(['goalcompletedpercentage' => round($gcp,2)]);
  DB::table('tasks')->where([['id',$request->id],['taskauthorization','<>','gift']])->delete();
  echo round($gcp,2);
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

public function increasepercentage(request $request)
{
  $task = DB::table('tasks')->where([['goalid',$request->goalid],['taskauthorization','<>','gift']])->get();
  $tcpt=0;
  foreach ($task as $tasks) {
    if ($tasks->id!=$request->id) {
      $tcpt=$tcpt+$tasks->taskcompletedpercentage;
    }
  }
  $gcp=(($tcpt+$request->completedpercentage)/(count($task)*100))*100;
  DB::table('tasks')
            ->where('id', $request->id)
            ->update(['taskcompletedpercentage' => $request->completedpercentage]);
  DB::table('goals')
            ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
            ->update(['goalcompletedpercentage' => round($gcp,2)]);
  echo round($gcp,2);
}

public function allcomplete(request $request)
{
  $task = DB::table('tasks')->where([['goalid',$request->goalid],['taskauthorization','<>','gift']])->get();
  $tcpt=0;
  foreach ($task as $tasks) {
    if ($tasks->id!=$request->id) {
      $tcpt=$tcpt+$tasks->taskcompletedpercentage;
    }
  }
  $gcp=(($tcpt+100)/(count($task)*100))*100;
  DB::table('tasks')
            ->where('id', $request->id)
            ->update(['taskcompletedpercentage' => 100]);
  DB::table('goals')
            ->where([['goalid', $request->goalid],['goalauthorization','<>','gift']])
            ->update(['goalcompletedpercentage' => round($gcp,2)]);
  echo round($gcp,2);
}

public function inputlike(request $request){
        $goalid=$request->goalid;
        $type=$request->type;
        $email=Auth::User()->email;
        DB::table('likes')->insert(
                [ 'goalid' => $goalid,
                  'email'=> $email,
                  'type' => $type,
                ]
            );
      DB::table('likes')->where([['goalid',$goalid],['type','d']])->delete();
}
//
public function inputdislike(request $request){
        $goalid=$request->goalid;
        $type=$request->type;
        $email=Auth::User()->email;
        DB::table('likes')->insert(
                [ 'goalid' => $goalid,
                  'email'=> $email,
                  'type' => $type,
                ]
            );
      DB::table('likes')->where([['goalid',$goalid],['type','l']])->delete();
}

public function asigntotask(request $request)
{
  DB::table('taskasign')->insert(
          [ 'taskid' => $request->taskid,
            'userid'=> $request->id,
            'fname'=> $request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'avatar'=>$request->avatar,
          ]
      );
  $user=DB::table('users')->where('id',$request->id)->get();
  echo json_encode($user);
}

public function addnote(request $request)
{
  DB::table('tasks')
            ->where('id', $request->taskid)
            ->update(['note' => $request->note]);
  echo "done";
}

public function updategoalname(request $request)
{
  DB::table('goals')
            ->where([['goalid', $request->goalid],['email',Auth::User()->email]])
            ->update(['goalname' => $request->goalname]);
  echo $request->goalname;
}

public function updategoalintent(request $request)
{
  DB::table('goals')
            ->where([['goalid',$request->goalid],['email',Auth::User()->email]])
            ->update(['goalintent'=>$request->goalintent]);
  echo $request->goalintent;
}

public function updategoalpriority(request $request)
{
  DB::table('goals')
            ->where([['goalid',$request->goalid],['email',Auth::User()->email]])
            ->update(['goalpriority'=>$request->goalpriority]);
  echo $request->goalpriority;
}

public function updategoalcategory(request $request)
{
  DB::table('goals')
            ->where([['goalid',$request->goalid],['email',Auth::User()->email]])
            ->update(['goalcategory'=>$request->goalcategory]);
  echo $request->goalcategory;
}

public function updategoalstartdate(request $request)
{
  # code...
}

public function updategoalenddate(request $request)
{
  # code...
}

public function taskbrag(request $request)
{
  //$brag=Auth::User()->fname.' '.Auth::User()->lname.' completed '.$request->taskcompletedpercentage.' of '.$request->taskname;
  DB::table('brag')->insert(
          [ 'goalid' => $request->goalid,
            'email'=> Auth::User()->email,
            'type'=> 'task',
            'brag'=> Auth::User()->fname.' '.Auth::User()->lname.' completed '.$request->taskcompletedpercentage.' of '.$request->taskname,
          ]
      );
  echo "fghghfghfghfgh";
}

}
