<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class filesController extends Controller
{
    public function view()
    {
      if(Auth::check()){
      $id = Auth::id();
      $email=Auth::User()->email;
      $files=DB::table('files')->where([['userid',$id],['delete_status',0]])->orderBy('created_date', 'asc')->get();
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
      return view('files',['files'=>$files,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos]);}
      else {
        return view('/');
      }
    }

    public function uploadfile(request $request)
    {
     if(isset($request->filename)){
           $filename=$request->filename;
           DB::table('files')->insert(
                   [
                     'userid'=> Auth::id(),
                     'filename' => $filename,
                     'created_date'=> Carbon::now(),
                   ]
               );

     }
      return redirect('/files');
    }

    public function deletefile(request $request)
    {
      if (isset($request->id)) {
        $id=$request->id;
        DB::table('files')
                  ->where([['userid', Auth::id()],['id',$id]])
                  ->update(['delete_status' => 0]);
      }
      return redirect('/files');
    }
}
