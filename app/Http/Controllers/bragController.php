<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class bragController extends Controller
{
    public function view()
    {
      $id=Auth::id();
      $email=Auth::User()->email;
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

      $allemail=DB::table('users')->pluck('email');
      return view('brag',['notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'allemail'=>$allemail]);
    }
}
