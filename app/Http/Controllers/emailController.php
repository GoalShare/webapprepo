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

      for(var x=0;x<$emaillength;x++){
        echo $request->val.x;
      }
  }
}
