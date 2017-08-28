<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
class TestController extends Controller
{
    public function testget(){
      if(Auth::check()){
      $id = Auth::id();
      $email=Auth::User()->email;

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


      return view('test',['categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos]);}
      else {
        return view('/');

      }
    }


//     public function importGoogleContact()
// {
//     // get data from request
//     $code = Request::get('code');
//
//     // get google service
//     $googleService = \OAuth::consumer('Google');
//
//     // check if code is valid
//
//     // if code is provided get user data and sign in
//     if ( ! is_null($code)) {
//         // This was a callback request from google, get the token
//         $token = $googleService->requestAccessToken($code);
//
//         // Send a request with it
//         $result = json_decode($googleService->request('https://www.google.com/m8/feeds/contacts/default/full?alt=json&max-results=400'), true);
//
//         // Going through the array to clear it and create a new clean array with only the email addresses
//         $emails = []; // initialize the new array
//         foreach ($result['feed']['entry'] as $contact) {
//             if (isset($contact['gd$email'])) { // Sometimes, a contact doesn't have email address
//                 $emails[] = $contact['gd$email'][0]['address'];
//             }
//         }
//
//         return $emails;
//
//     }
//
//     // if not ask for permission first
//     else {
//         // get googleService authorization
//         $url = $googleService->getAuthorizationUri();
//
//         // return to google login url
//         return redirect((string)$url);
//     }
//   }
}
