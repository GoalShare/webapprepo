<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class emailController extends Controller
{
  public function viewemails(request $request) {
      $checkArraydata = $request->input('checkArray');
      echo $checkArraydata;
  }
}
