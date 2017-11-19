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

class learningboardController extends Controller
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

  $likesanddislikes=DB::table('learninboardcontentlikes')->get();
  return view('learningboard',['likesanddislikes'=>$likesanddislikes,'goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail]);
}

public function getlearningboards(request $request){
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
  $ccid=$request->CCIDfilename;
  $scid=$request->SCIDfilename;
  $lbid=$request->LBIDfilename;
  $learningboardfilestable=DB::table('learningboardfile')->orderBy('ID', 'desc')->get();
  $learningboardtable=DB::table('learningboards')->orderBy('ID', 'desc')->get();
  $users=DB::table('users')->get();
  $likesanddislikes=DB::table('learninboardcontentlikes')->get();
  return view('learningboard',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'ccid'=>$ccid,'scid'=>$scid,'lbid'=>$lbid,'learningboardfilestable'=>$learningboardfilestable,'learningboardtable'=>$learningboardtable,'users'=>$users,'likesanddislikes'=>$likesanddislikes]);

}

public function subconlikes(request $request){
  $lbsubconid=$request->subconid;
  $type=$request->type;
  $userid=Auth::id();
 DB::table('learninboardcontentlikes')->insert(
         [ 'contectid' => $lbsubconid,
           'userid'=> $userid,
           'type' => $type,
         ]
     );
 // DB::table('likes')->where([['goalid',$goalid],['type','d']])->delete();
}

}
