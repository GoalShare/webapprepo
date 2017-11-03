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

class getexistingboardController extends Controller
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

  return view('exsistingsubpage',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail]);
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
  return view('exsistingsubpage',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'ccid'=>$ccid,'scid'=>$scid,'lbid'=>$lbid,'learningboardfilestable'=>$learningboardfilestable,'learningboardtable'=>$learningboardtable,'users'=>$users]);

}

public function existingboarduploadfile(request $request){

  $id=Auth::id();
  $filename=$request->filename;
  $title=$request->title;
  $ldiscription=$request->discription;
  $ctid=$request->CTIDinput;
  $ccid=$request->CCIDinput;
  $scid=$request->SCIDinput;
  $lid=$request->LIDinput;

  DB::table('learningboardfile')->insert(
          [

            'L_ID'=>$lid,
            'user_ID'=> Auth::id(),
            'title'=> $title,
            'filename' => $filename,
            'date'=> Carbon::now(),
            'discription'=>$ldiscription,
            'CT_ID'=>$ctid,
            'CC_ID'=>$ccid,
            'SC_ID'=>$scid,

          ]
      );
      return redirect('/existingboard');
}
}
