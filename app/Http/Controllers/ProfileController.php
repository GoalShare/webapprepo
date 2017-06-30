<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Goal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class ProfileController extends Controller

{
 public function view($userid){
   $email=Auth::User()->email;
   $goal = DB::table('goals')->where('email',$email)->get();
   $userskill=DB::table('userskills')->where('email',$email)->get();
   $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
   return view('profileView',['goal'=>$goal,'userskill'=>$userskill,'categorylist'=>$categorylist]);
 }
 public function post(request $request){
   if($request->hasfile('profilepic')){
       $file = $request->file('profilepic');
       if($file->getClientOriginalExtension()=='jpg' ||$file->getClientOriginalExtension()=='jpeg' ){
         $filename=time().'1.'.$file->getClientOriginalExtension();
         Image::make($file)->resize(200,200)->save(public_path('uploads/avatars/'. $filename ));
         $user=User::find(Auth::id());
         $user->avatar=$filename;
         $user->save();
         return redirect('profile/'.Auth::id());
       }
       else {
         echo "errorss";
       }

       }
   else {
     return redirect('profile/'.Auth::id());
   }
   echo "yoiuuu";
 }
}
