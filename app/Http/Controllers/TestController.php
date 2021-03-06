<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
class TestController extends Controller
{
    public function testget(){
      if(Auth::check()){
      $id = Auth::id();
      $email=Auth::User()->email;

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
      $notification=DB::table('goal_registry')->where([['receiver_email',$email],['status','notseen']])->orderBy('added_date', 'desc')->get();
      $allemail=DB::table('users')->pluck('email');

      return view('test',['categorylist'=>$categorylist,'notification'=>$notification,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'allemail'=>$allemail]);}
      else {
        return view('/');

      }
    }

}
