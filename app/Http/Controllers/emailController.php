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
      echo $request->"0";
  }
}
