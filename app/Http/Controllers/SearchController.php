<?php

namespace App\Http\Controllers;
use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{

  public function post(request $request){
    $searchkey=$request->searchkey;
    $email=Auth::User()->email;
    $categorylist = DB::table('goals')
    ->select('goalcategory')
    ->where('email', $email)
    ->groupBy('goalcategory')
    ->get();
    $id=Auth::id();
    $friendrequest=DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user')
            ->select('users.*', 'friendships.*')
            ->where([['friendships.status','requested'],['friendships.friend',$id]])
            ->get();
    $userkey= DB::table('users')->where('email','like', "%".$searchkey."%")->get(['lname','fname','id','email','dob','phone','avatar']);
    $userfname= DB::table('users')->where('fname','like', "%".$searchkey."%")->get(['lname','fname','id','email','dob','phone','avatar']);
  //  $userphone= DB::table('users')->where('phone','like', "%".$searchkey."%")->get(['lname','fname','id','email','dob','phone','avatar']);
    $userlname= DB::table('users')->where('lname','like', "%".$searchkey."%")->get(['lname','fname','id','email','dob','phone','avatar']);


    function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      if(!is_ajax_request()) {
        return view('friendsView',['user'=>$user,'categorylist'=>$categorylist,'searchkey'=>$searchkey,'friendrequest'=>$friendrequest,'userlname'=>$userlname,'userfname'=>$userfname]);
      }


      echo json_encode($userkey);





  }
}
