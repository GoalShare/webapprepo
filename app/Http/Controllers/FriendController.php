<?php
namespace App\Http\Controllers;
use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller{

  public function addfriend(request $request){
    DB::table('friendships')->insert(
            [
              'user'=> Auth::id(),
              'friend'=>$request->friendid,
              'status'=>$request->friend,
              'created_at'=> Carbon::now(),
            ]
        );
     return redirect('/search/'.$request->friendid);

  }
}
