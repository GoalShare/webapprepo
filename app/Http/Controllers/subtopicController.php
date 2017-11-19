<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Goal;
use App\Portfolio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class subtopicController extends Controller
{

  public function view(){
    $id=Auth::id();
    $email=Auth::User()->email;
    $goal = DB::table('goals')->where('email',$email)->get();
    $userskill=DB::table('userskills')->where('email',$email)->get();
    $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
    $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
    $friendrequest=DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user')
            ->select('users.*', 'friendships.*')
            ->where([['friendships.status','requested'],['friendships.friend',$id]])
            ->get();
            $id=Auth::id();
     $friends=DB::table('friendships')
                    ->join('users', 'users.id', '=', 'friendships.user')
                    ->select('users.*', 'friendships.*')
                    ->where([['friendships.status','friends'],['friendships.friend',$id]])
                    ->get();
    $friendstwos=DB::table('friendships')
                   ->join('users', 'users.id', '=', 'friendships.friend')
                   ->select('users.*', 'friendships.*')
                   ->where([['friendships.status','friends'],['friendships.user',$id]])
                   ->get();
    $portfolio=DB::table('portfolio')->where('userid',$id)->get();

    $allemail=DB::table('users')->pluck('email');

    $likesanddislikes=DB::table('likes')->where('goalid',$goalid)->get();

    return view('subtopic',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail]);

  }

  public function subtopic(request $request){

    $id=Auth::id();
    $email=Auth::User()->email;
    $goal = DB::table('goals')->where('email',$email)->get();
    $userskill=DB::table('userskills')->where('email',$email)->get();
    $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
    $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
    $friendrequest=DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user')
            ->select('users.*', 'friendships.*')
            ->where([['friendships.status','requested'],['friendships.friend',$id]])
            ->get();
            $id=Auth::id();
     $friends=DB::table('friendships')
                    ->join('users', 'users.id', '=', 'friendships.user')
                    ->select('users.*', 'friendships.*')
                    ->where([['friendships.status','friends'],['friendships.friend',$id]])
                    ->get();
    $friendstwos=DB::table('friendships')
                   ->join('users', 'users.id', '=', 'friendships.friend')
                   ->select('users.*', 'friendships.*')
                   ->where([['friendships.status','friends'],['friendships.user',$id]])
                   ->get();
    $portfolio=DB::table('portfolio')->where('userid',$id)->get();

    $allemail=DB::table('users')->pluck('email');

    $x=$request->subtopicfilename;
    $topic=$request->topicfilename;
    $acodamicsubtopicID=DB::table('Sub_Contain')->get();
    $acodamictopicsID=DB::table('Category_Contain')->get();
    $learningboard=DB::table('learningboards')->get();

    $likesanddislikes=DB::table('learningboardsubtopiclikes')->get();

    return view('subtopic',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'x'=>$x,'acodamicsubtopicID'=>$acodamicsubtopicID,'acodamictopicsID'=>$acodamictopicsID,'topic'=>$topic,'learningboard'=>$learningboard,'likesanddislikes'=>$likesanddislikes]);

    // echo $x;
  }

  public function lsubtopilikes(request $request){
        $learningbordsid=$request->learningbordsid;
        $type=$request->type;
        $userid=Auth::id();
       DB::table('learningboardsubtopiclikes')->insert(
               [ 'learningboardtopicid' => $learningbordsid,
                 'userid'=> $userid,
                 'type' => $type,
               ]
           );
       // DB::table('likes')->where([['goalid',$goalid],['type','d']])->delete();
  }

}
