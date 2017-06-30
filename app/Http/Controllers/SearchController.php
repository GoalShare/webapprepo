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
    $user= DB::table('users')->where('email','like', "%".$searchkey."%")->get(['lname','fname','id','email','dob','phone','avatar']);
    return view('friendsView',['user'=>$user,'categorylist'=>$categorylist,'searchkey'=>$searchkey]);
  }
}
