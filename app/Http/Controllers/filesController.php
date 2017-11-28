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
      $files=DB::table('files')->where([['userid',$id],['delete_status',0]])->orderBy('created_date', 'desc')->get();
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
      return view('files',['files'=>$files,'categorylist'=>$categorylist,'notification'=>$notification,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'allemail'=>$allemail]);}
      else {
        return view('/');

      }
    }

    public function uploadfile(request $request)
    {
     if(isset($request->filename)){
           $filename=$request->filename;
           $filesize=$request->filesize;
           DB::table('files')->insert(
                   [
                     'userid'=> Auth::id(),
                     'filename' => $filename,
                     'size' => $filesize,
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
                  ->update(['delete_status' => 1]);
      }
      return redirect('/files');


    }

    public function updatefilename(request $request){
        $newfilename=$request->newfilename;
        $id=$request->newfileid;
        DB::table('files')
               ->where(['id'=>$id])
               ->update(['fakename'=>$newfilename]);
               return redirect('/files');
    }

}
