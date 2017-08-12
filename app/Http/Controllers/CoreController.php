<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CoreController extends Controller
{
    public function checkmails(request $request)
    {
      // $checkemail=$request->checkemail;
      // $mails=DB::table('users')->where('email',$checkemail)->get();
      // if ($mails->isEmpty()) {
      //   echo "true";
      // }
      // else {
      //   echo "false";
      // }
      echo "string";
    }
    public function test(request $request)
    {
      echo $request->fname.$request->lname.$request->email.$request->password.$request->gender.$request->dob.$request->countrycode.$request->phone;
    }
}
