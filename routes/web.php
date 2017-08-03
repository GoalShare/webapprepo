<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
      return redirect('/dashboard');
    }
    else {
      return view('goalsforlife');
    }

});
Auth::routes();
Route::get('/calendar',function(){
  return view('calender');
});
Route::post('deletealigned','AlignController@deletealigned')->name('deletealigned');
Route::post('profile','ProfileController@post')->name('profile');
Route::post('goalPicUpload','GoalController@upateGoalPic')->name('goalPicUpload');
Route::post('checkemail','CoreController@checkmails')->name('checkemail');
Route::post('goal','GoalController@post')->name('goal');
Route::post('updatetask','GoalController@updatetask')->name('updatetask');
Route::post('addbio','ProfileController@addbio')->name('addbio');
Route::post('modifyprofile','ProfileController@modifyprofile')->name('modifyprofile');
Route::post('task','TaskController@post')->name('task');
Route::post('/dashboard','HomeController@post');
Route::get('/calendar','calendarController@view');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/goal/{goalname}','GoalController@view');
Route::post('comment','commentController@post')->name('comment');
Route::get('/profile/{userid}','ProfileController@view');
Route::get('/dashboard/{category}', 'HomeController@category');
Route::get('/search',function(){
  if(Auth::check()){
    $id=Auth::id();
      $email=Auth::User()->email;
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
  return view('friendsView',['categorylist'=>$categorylist,'friendrequest'=>$friendrequest]);}
  else {
    return view('welcome');
  }
});
Route::get('/search/{userid}',function($userid){
  $portfolio=DB::table('portfolio')->where('userid',$userid)->get();
  $email=Auth::User()->email;
  $id=Auth::id();
  $user= DB::table('users')->where('id',$userid)->get();
  foreach ($user as $users) {
  }
  $useremail=$users->email;
  $userskill=DB::table('userskills')->where('email',$useremail)->get();
  $goal = DB::table('goals')->where('email',$useremail)->get();
  $privacys=DB::table('privacys')->where('email',$useremail)->get();
  $userskill=DB::table('userskills')->where('email',$useremail)->get();
  $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
  $friendship=DB::table('friendships')->where([['user',$id],['friend',$userid]])->orWhere([['user',$userid],['friend',$id]])->value('status');
  $friendrequest=DB::table('friendships')
          ->join('users', 'users.id', '=', 'friendships.user')
          ->select('users.*', 'friendships.*')
          ->where([['friendships.status','requested'],['friendships.friend',$id]])
          ->get();
          $friends=DB::table('friendships')
                         ->join('users', 'users.id', '=', 'friendships.user')
                         ->select('users.*', 'friendships.*')
                         ->where([['friendships.status','friends'],['friendships.friend',$userid]])
                         ->get();
         $friendstwos=DB::table('friendships')
                        ->join('users', 'users.id', '=', 'friendships.friend')
                        ->select('users.*', 'friendships.*')
                        ->where([['friendships.status','friends'],['friendships.user',$userid]])
                        ->get();
                         $id=Auth::id();
  return view('friendsProfileView',['user'=>$user,'goal'=>$goal,'userskill'=>$userskill,'categorylist'=>$categorylist,'friendship'=>$friendship,'friendrequest'=>$friendrequest,'friends'=>$friends,'privacys'=>$privacys,'userskill'=>$userskill,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio]);
});
Route::post('skill','SkillController@skill')->name('skill');
Route::post('deleteportfolio','ProfileController@deleteportfolio')->name('deleteportfolio');
Route::post('addpreviouswork','ProfileController@addpreviouswork')->name('addpreviouswork');
Route::post('addcurrentwork','ProfileController@addcurrentwork')->name('addcurrentwork');
Route::post('addprimary','ProfileController@addprimary')->name('addprimary');
Route::post('addsecondary','ProfileController@addsecondary')->name('addsecondary');
Route::post('addcollege','ProfileController@addcollege')->name('addcollege');
Route::post('addfacebook','ProfileController@addfacebook')->name('addfacebook');
Route::post('addlinkedin','ProfileController@addlinkedin')->name('addlinkedin');
Route::post('addtwitter','ProfileController@addtwitter')->name('addtwitter');
Route::post('addinstagram','ProfileController@addinstagram')->name('addinstagram');
Route::post('addfrom','ProfileController@addfrom')->name('addfrom');
Route::post('addliving','ProfileController@addliving')->name('addliving');
Route::post('adduniversity','ProfileController@adduniversity')->name('adduniversity');
Route::post('addinterests','ProfileController@addinterests')->name('addinterests');
Route::post('addachievements','ProfileController@addachievements')->name('addachievements');
Route::post('addresearchpapers','ProfileController@addresearchpapers')->name('addresearchpapers');
Route::post('addpatents','ProfileController@addpatents')->name('addpatents');
Route::post('addprofqual','ProfileController@addprofqual')->name('addprofqual');
Route::post('goalskill','SkillController@goalskill')->name('goalskill');
Route::post('strength','SkillController@strength')->name('strength');
Route::post('deleteskill','SkillController@deleteskill')->name('deleteskill');
Route::post('deletegoalskill','SkillController@deletegoalskill')->name('deletegoalskill');
Route::post('/search','SearchController@post')->name('search');
Route::post('deletetask','GoalController@deletetask')->name('deletetask');
Route::post('deletegoal','HomeController@deletegoal')->name('deletegoal');
Route::post('addfriend','FriendController@addfriend')->name('addfriend');
Route::post('share','ShareController@share')->name('share');
Route::post('align','AlignController@align')->name('align');
Route::get('/aboutus', function () {
  $id=Auth::id();
  $email=Auth::User()->email;
  $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
  $friendrequest=DB::table('friendships')
          ->join('users', 'users.id', '=', 'friendships.user')
          ->select('users.*', 'friendships.*')
          ->where([['friendships.status','requested'],['friendships.friend',$id]])
          ->get();
    return view('aboutus',['categorylist'=>$categorylist,'friendrequest'=>$friendrequest]);
});
Route::get('/policies', function () {

    return view('policies');
});
Route::get('/prof', function () {
    return view('catogorizedView');
});
Route::post('confirmfriend',function(request $request)
{
  $id=Auth::id();
  DB::table('friendships')
            ->where([['friend', $id],['user',$request->userid]])
            ->update(['status' => 'friends']);
  return back();
})->name('confirmfriend');
Route::get('/nonLoginAboutus', function () {
    return view('nonLoginAboutus');
});
Route::get('/nonLoginPolicies', function () {
    return view('nonLoginPolicies');
});
