<?php

namespace App\Http\Controllers;
use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GoalController extends Controller{
  public function post(request $request){
    echo "sum faq";
    $email=Auth::user()->email;
    $control=$request->action;
    switch ($control) {
      case 'addtask':
        echo "sum faq";
      default:
        # code...
        break;
    }



  }
}
