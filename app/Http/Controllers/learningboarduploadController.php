<?php


namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Goal;
use App\Portfolio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class learningboarduploadController extends Controller
{
  public function view(){
    $id=Auth::id();
    $email=Auth::User()->email;
    $goal = DB::table('goals')->where('email',$email)->get();
    $userskill=DB::table('userskills')->where('email',$email)->get();
    $categorylist = DB::table('goals')->select('goalcategory')->where('email', $email)->groupBy('goalcategory')->get();
    $notification=DB::table('goal_registry')->where('receiver_email',$email)->get();
    $friendrequest=DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user')
            ->select('users.*', 'friendships.*')
            ->where([['friendships.status','requested'],['friendships.friend',$id]])
            ->get();
            $id=Auth::id();
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
    $portfolio=DB::table('portfolio')->where('userid',$id)->get();

    $allemail=DB::table('users')->pluck('email');
    $Categorytype=DB::table('Category_Type')->get();
    $Categorycontain=DB::table('Category_Contain')->orderBy('Category_Contain_Name', 'asc')->get();
    $Subcontain=DB::table('Sub_Contain')->get();


    return view('learningboardupload',['goal'=>$goal,'userskill'=>$userskill,'notification'=>$notification,'categorylist'=>$categorylist,'friendrequest'=>$friendrequest,'friends'=>$friends,'friendstwos'=>$friendstwos,'portfolio'=>$portfolio,'allemail'=>$allemail,'Categorytype'=>$Categorytype,'Categorycontain'=>$Categorycontain,'Subcontain'=>$Subcontain]);

  }

  public function getselecteditem(request $request){
    $selectedid=$request->selectedID;

    $CategorycontainCTID=DB::table('Category_Contain')->select('Category_Contain_Name','ID')->where('CT_ID', $selectedid)->get();

      // echo $CategorycontainCTID;

      echo json_encode($CategorycontainCTID);

  }

  public function getcategorycontent(request $request){
      $selectedcategorycontent=$request->selectedcategorytypeID;

      $SubCategorycontain=DB::table('Sub_Contain')->select('Sub_Contain_Name','ID')->where('CC_ID',$selectedcategorycontent)->get();
      echo json_encode($SubCategorycontain);
  }

  public function learningboarduploadfile(request $request){
    if(isset($request->filename) && isset($request->learningboardname)){
          $id=Auth::id();
          $filename=$request->filename;
          $title=$request->title;
          $learningboardname=$request->learningboardname;
          $ldiscription=$request->discription;
          $learningboardpriority=$request->learningboardpriority;
          $learningboardcategorytype=$request->categorytype;
          $learningboardcategorycontain=$request->categorycontain;
          $learningboardsubcategory=$request->subcategory;

          DB::table('learningboards')->insert(
                  [
                    'ID'=>date("Ymdhis"),
                    'LB_Name' => $learningboardname,
                    'user_ID'=> Auth::id(),
                    'priority'=> $learningboardpriority,
                    'CT_ID'=>$learningboardcategorytype,
                    'CC_ID'=>$learningboardcategorycontain,
                    'SC_ID'=>$learningboardsubcategory,

                  ]
              );


          DB::table('learningboardfile')->insert(
                  [
                    'user_ID'=> Auth::id(),
                    'L_ID'=>date("Ymdhis"),
                    'filename' => $filename,
                    'title'=> $title,
                    'discription'=>$ldiscription,
                    'CT_ID'=>$learningboardcategorytype,
                    'CC_ID'=>$learningboardcategorycontain,
                    'SC_ID'=>$learningboardsubcategory,
                    'date'=> Carbon::now(),
                  ]
              );

    }
     return redirect('/learningboardupload');
  }

  public function inputlearningboard(request $request){
            $searchname=$request->searchname;

            $dbsearchname=DB::table('learningboards')->select('LB_Name')->where('LB_Name',$searchname)->distinct()->get();

            if($dbsearchname !== null){
            echo json_encode($dbsearchname);
            }
  }
}
