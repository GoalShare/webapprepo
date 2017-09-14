<?php

namespace App\Http\Controllers;



use App\Models\News;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class emailController extends Controller
{
  public function viewemails(request $request) {

      $emaillength=$request->length;

      for($x=0;$x<$emaillength;$x++){
        $email="val".$x;


        DB::table('notifications')->insert(
                [
                  'to'=> $request->$email,
                  'subject' => 'Welcome',
                  'message'=> 'We warmly welcome you to lifewithgoals family http://www.lifewithgoals.com',
                  'template_name'=>'Invite',
                  'message_type'=>1,
                ]
            );
      }
        return redirect()->back();
  }

  

}
