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

class existingboardController extends Controller
{
  public function view(){
    $id=Auth::id();
    $email=Auth::User()->email;
    $goal = DB::table('goals')->where('email',$email)->get();
    $userskill=DB::table('userskills')->where('email',$email)->get();
    $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
    $notification=DB::table('goal_registry')->where([['receiver_email',$email],['status','notseen']])->orderBy('added_date', 'desc')->get();
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
    $acodamictopics=DB::table('Category_Contain')->orderBy('Category_Contain_Name', 'asc')->get();
    $acodamicsubtopics=DB::table('Sub_Contain')->get();
    return view('existingboard',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'acodamictopics'=>$acodamictopics,'acodamicsubtopics'=>$acodamicsubtopics]);

  }

  public function exsitingsubtopicformrout(request $request){

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

    return view('existingsubtopic',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'x'=>$x,'acodamicsubtopicID'=>$acodamicsubtopicID,'acodamictopicsID'=>$acodamictopicsID,'topic'=>$topic,'learningboard'=>$learningboard]);

    // echo $x;
  }
}
