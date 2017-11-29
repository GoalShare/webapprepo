<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;


class calendarController extends Controller
{
    public function view()
    {
      if(Auth::check()){
      $id = Auth::id();
      $email=DB::table('users')->where('id',$id)->value('email');
      $goal = DB::table('goals')->where('email',$email)->get();
      $task = DB::table('tasks')->where('email', $email)->get();
      $notification=DB::table('goal_registry')->where([['receiver_email',$email],['status','notseen']])->orderBy('added_date', 'desc')->get();
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

        $allemail=DB::table('users')->pluck('email');
      return view('calanderview',['goal'=>$goal,'task'=>$task,'notification'=>$notification,'email'=>$email,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'allemail'=>$allemail]);}
      else {
        return view('/');
      }
    }
}
