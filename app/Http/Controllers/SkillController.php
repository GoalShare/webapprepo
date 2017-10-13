<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SkillController extends Controller
{
  public function deleteskill(request $request)
  {
    $email=Auth::User()->email;
    $skill=$request->id;
    DB::table('userskills')->where('id',$skill)->Delete();
    echo $skill;
  }

  public function deletegoalskill(request $request)
  {
    $email=Auth::User()->email;
    $skill=$request->id;
    DB::table('goalskills')->where('id',$skill)->Delete();
    echo $skill;
  }
    public function skill(request $request)
    {
          $email=Auth::User()->email;
          DB::table('userskills')->insert(
                  [
                    'skill'=> $request->skill,
                    'email'=>$email,
                    'type' => 'skill',
                    'created_at'=> Carbon::now(),
                  ]
            );
            echo $request->skill;


        }


        public function strength(request $request)
        {
          $email=Auth::User()->email;
          DB::table('userskills')->insert(
                       [
                         'email'=>$email,
                         'skill'=> $request->strength,
                         'type' => 'strength',
                         'created_at'=> Carbon::now(),
                     ]
                  );
          echo $request->strength;
                }

                public function goalskill(request $request)
                {
                  $email=Auth::User()->email;
                  DB::table('goalskills')->insert(
                               [
                                 'email'=>$email,
                                 'goalid'=>$request->goalid,
                                 'skill'=> $request->goalskill,
                                'created_at'=> Carbon::now(),
                             ]
                          );
                  return redirect()->back();
                        }
}
