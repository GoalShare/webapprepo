<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Mail;
use App\Mail\newuserwelcomeMain;


class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::check()){
      $id = Auth::id();
      $email=DB::table('users')->where('id',$id)->value('email');
      $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
      $goal = DB::table('goals')->where('email',$email)->get();
      $alignedgoal=DB::table('goalalignment')
                  ->join('goals','goals.goalid','=','goalalignment.goalid')
                  ->select('goals.*')
                  ->where('goalalignment.email',$email)
                  ->get();
      $task = DB::table('tasks')->where('email', $email)->get();
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
      return view('dashboard',['alignedgoal'=>$alignedgoal,'goal'=>$goal,'task'=>$task,'email'=>$email,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'notification'=>$notification,'allemail'=>$allemail]);}
      else {
        return view('/');
      }
    }

    public function post(request $request){

    switch ($request->action) {
      case 1:
        DB::table('goals')
             ->where([['goalid', $request->goalid],['email',$request->email]])
             ->update(['pinned' => $request->pinned]);
       $id = Auth::id();
       $email=DB::table('users')->where('id',$id)->value('email');
       $goal = DB::table('goals')->where('email',$email)->get();
       $task = DB::table('tasks')->where('email', $email)->get();
      return redirect()->back();
        break;
        case 2:
          $email=Auth::user()->email;
          $id=Auth::id();
          $goalid=$id.Carbon::now();

          if($request->hasfile('goalpicture')){
              $file = $request->file('goalpicture');
              if($file->getClientOriginalExtension()=='jpg' ||$file->getClientOriginalExtension()=='jpeg' ){
                $filename=time().'1.'.$file->getClientOriginalExtension();
                $filenamethumb=time().'2.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->opacity(50)->save(public_path('uploads/goals/'. $filenamethumb ));
                Image::make($file)->resize(1142,400)->opacity(50)->save(public_path('uploads/goals/'. $filename ));
                DB::table('goals')->insert(
                        [
                          'goalid'=> $goalid,
                          'email'=> $email,
                          'goalname' => $request->goalname,
                          'goalintent' => $request->goalintent,
                          'goalpriority' => $request->goalpriority,
                          'goalcategory' => $request->goalcategory,
                          'goalstartdate' => $request->goalstartdate,
                          'goalenddate' => $request->goalenddate,
                          'goalauthorization' => 'creator',
                          'goalpictureone'=>$filename,
                          'goalpicturetwo'=>$filenamethumb,
                          'pinned'=>1,
                          'created_at'=>Carbon::now(),
                          'color'=> '0'.rand(0,99),
                        ]
                    );
                    DB::table('privacys')->insert(
                            [
                              'goalid'=> $goalid,
                              'email'=> $email,
                              'goalauthorization'=>'creator',
                              'created_at'=>Carbon::now(),
                            ]
                        );
                  return redirect()->back();

              }
              else {

              }


          }
          else {

            $getgoalcategory=$request->goalcategory;

            if($getgoalcategory=="Be happy"){
            DB::table('goals')->insert(
                    [
                      'goalid'=> $goalid,
                      'email'=> $email,
                      'goalname' => $request->goalname,
                      'goalintent' => $request->goalintent,
                      'goalpriority' => $request->goalpriority,
                      'goalcategory' => $request->goalcategory,
                      'goalstartdate' => $request->goalstartdate,
                      'goalenddate' => $request->goalenddate,
                      'goalauthorization' => 'creator',
                      'goalpictureone'=>'defaultbig.jpg',
                      'goalpicturetwo'=>'park.png',
                      'pinned'=>1,
                      'created_at'=>Carbon::now(),
                      'color'=> '0'.rand(0,99),
                    ]
                );
}

else if($getgoalcategory=="Career and professional growth"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'gradu.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Community and recreation"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'2men.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Creativity and Designs"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'sdv-1.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Drama, Entertainment and Music"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'music.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Education and Learning"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'book.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Travel and Adventure"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'dd.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Finance and stability"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'gra.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}


else if($getgoalcategory=="Friends"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'walk.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}



else if($getgoalcategory=="Health, fitness and sports"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'run.png',
          'goalpicturetwo'=>'Untitled-1.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Hobbies"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'face.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Love, Marriage and Relationship"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'love.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}


else if($getgoalcategory=="Personal, family and home"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'house.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

else if($getgoalcategory=="Spiritual Life"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'Untitled-1.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}



else if($getgoalcategory=="Time of the Year"){
DB::table('goals')->insert(
        [
          'goalid'=> $goalid,
          'email'=> $email,
          'goalname' => $request->goalname,
          'goalintent' => $request->goalintent,
          'goalpriority' => $request->goalpriority,
          'goalcategory' => $request->goalcategory,
          'goalstartdate' => $request->goalstartdate,
          'goalenddate' => $request->goalenddate,
          'goalauthorization' => 'creator',
          'goalpictureone'=>'defaultbig.jpg',
          'goalpicturetwo'=>'calandar.png',
          'pinned'=>1,
          'created_at'=>Carbon::now(),
          'color'=> '0'.rand(0,99),
        ]
    );
}

                DB::table('privacys')->insert(
                        [
                          'goalid'=> $goalid,
                          'email'=> $email,
                          'goalauthorization'=>'creator',
                          'created_at'=>Carbon::now(),
                        ]
                    );
                return redirect('/dashboard');
          }
          break;

      default:
        # code...
        break;
    }


    }

    public function category($category)
    {
      if(Auth::check()){
      $id = Auth::id();
      $email=DB::table('users')->where('id',$id)->value('email');
      $goal = DB::table('goals')->where([['email',$email],['goalcategory',$category]])->get();
      $task = DB::table('tasks')->where('email', $email)->get();
      $categorylist = DB::table('goals')
      ->select('goalcategory')
      ->where('email', $email)
      ->groupBy('goalcategory')
      ->get();
      $friendrequest=DB::table('friendships')
              ->join('users', 'users.id', '=', 'friendships.user')
              ->select('users.*', 'friendships.*')
              ->where([['friendships.status','requested'],['friendships.friend',$id]])
              ->get();
      $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
      $allemail=DB::table('users')->pluck('email');
      return view('catogorizedView',['goal'=>$goal,'task'=>$task,'email'=>$email,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'category'=>$category,'notification'=>$notification,'allemail'=>$allemail]);}
      else {
        return view('/');
      }
    }


      public function deletegoal(request $request)
      {
        $email=Auth::User()->email;
        DB::table('goals')->where([['goalid',$request->goalid],['email',$email]])->delete();
        DB::table('tasks')->where([['goalid',$request->goalid],['email',$email]])->delete();
        return redirect('/dashboard');

      }

      public function emailmain()
    {

    Mail::to(Auth::User()->email)->send(new newuserwelcomeMain());
    return redirect('/dashboard');

    }

public function confirmuser()
  {


  return redirect('/dashboard');

  }

  public function logingaboutus(){

    return view('loginaboutus');

  }

    }
