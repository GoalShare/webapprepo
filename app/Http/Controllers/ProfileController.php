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

class ProfileController extends Controller

{
 public function view($userid){
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

   $allemail=DB::table('users')->value('email');
   return view('profileView',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail]);
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

public function addbio(request $request)
{
  $id=Auth::id();
  $user=User::find($id);
  $user->bio=$request->bio;
  $user->save();
  echo json_encode($request->bio);
}
public function deleteportfolio(request $request)
{
  $id=$request->id;
  DB::table('portfolio')->where('id',$id)->delete();
  echo "string";
}
public function addpreviouswork(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'work',
            'userid'=>Auth::id(),
            'nature'=>'previous',
            'data' => $request->previous,
          ]
    );
    // echo json_encode($request->previous);
    return redirect()->back();


}

public function addcurrentwork(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'work',
            'userid'=>Auth::id(),
            'nature'=>'current',
            'data' => $request->current,
          ]
    );
    // echo json_encode($request->current);
    return redirect()->back();

}

public function addprimary(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'education',
            'userid'=>Auth::id(),
            'nature'=>'primarysch',
            'data' => $request->primary,
          ]
    );
    // echo json_encode($request->primary);
    return redirect()->back();


}

public function addsecondary(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'education',
            'userid'=>Auth::id(),
            'nature'=>'secondarysch',
            'data' => $request->secondary,
          ]
    );
    // echo json_encode($request->secondary);
    return redirect()->back();


}

public function addcollege(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'education',
            'userid'=>Auth::id(),
            'nature'=>'college',
            'data' => $request->college,
          ]
    );
    // echo json_encode($request->college);
    return redirect()->back();


}

public function adduniversity(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'education',
            'userid'=>Auth::id(),
            'nature'=>'university',
            'data' => $request->university,
          ]
    );
    // echo json_encode($request->university);
    return redirect()->back();


}

public function addachievements(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'achievements',
            'userid'=>Auth::id(),
            'nature'=>'achievements',
            'data' => $request->achievements,
          ]
    );
    // echo json_encode($request->achievements);
    return redirect()->back();


}

public function addprofqual(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'profqual',
            'userid'=>Auth::id(),
            'nature'=>'profqual',
            'data' => $request->profqual,
          ]
    );
    // echo json_encode($request->profqual);
    return redirect()->back();


}
public function addpatents(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'patents',
            'userid'=>Auth::id(),
            'nature'=>'patents',
            'data' => $request->patents,
          ]
    );
    // echo json_encode($request->patents);
    return redirect()->back();


}
public function addresearchpapers(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'researchpapers',
            'userid'=>Auth::id(),
            'nature'=>'researchpapers',
            'data' => $request->researchpapers,
          ]
    );
    // echo json_encode($request->researchpapers);
    return redirect()->back();


}
public function addfrom(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'location',
            'userid'=>Auth::id(),
            'nature'=>'from',
            'data' => $request->from,
          ]
    );
    // echo json_encode($request->from);
    return redirect()->back();


}

public function addliving(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'location',
            'userid'=>Auth::id(),
            'nature'=>'living',
            'data' => $request->living,
          ]
    );
    // echo json_encode($request->living);
    return redirect()->back();


}

public function addinterests(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'interests',
            'userid'=>Auth::id(),
            'nature'=>'interests',
            'data' => $request->interests,
          ]
    );
    // echo json_encode($request->interests);
    return redirect()->back();


}
public function addfacebook(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'social',
            'userid'=>Auth::id(),
            'nature'=>'facebook',
            'data' => $request->facebook,
          ]
    );
    echo json_encode($request->facebook);

}

public function addlinkedin(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'social',
            'userid'=>Auth::id(),
            'nature'=>'linkedin',
            'data' => $request->linkedin,
          ]
    );
    echo json_encode($request->linkedin);

}

public function addtwitter(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'social',
            'userid'=>Auth::id(),
            'nature'=>'twitter',
            'data' => $request->twitter,
          ]
    );
    echo json_encode($request->twitter);

}

public function addinstagram(request $request)
{
  DB::table('portfolio')->insert(
          [
            'category'=> 'social',
            'userid'=>Auth::id(),
            'nature'=>'instagram',
            'data' => $request->instagram,
          ]
    );
    echo json_encode($request->instagram);

}
public function modifyprofile(request $request)
{
  $id=Auth::id();
  $user=User::find($id);
  $user->fname=$request->fname;
  $user->lname=$request->lname;
  $user->dob=$request->dob;
  $user->countrycode=$request->countrycode;
  $user->phone=$request->phone;
  $user->save();

  echo json_encode($user);
}



}
