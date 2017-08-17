<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Image;




class passwordReset extends Controller


{
   
// encryption and decryption
    function encrypt($sData, $sKey='mysecretkey'){ 
        $sResult = ''; 
        for($i=0;$i<strlen($sData);$i++){ 
            $sChar    = substr($sData, $i, 1); 
            $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1); 
            $sChar    = chr(ord($sChar) + ord($sKeyChar)); 
            $sResult .= $sChar; 
        } 
        return encode_base64($sResult); 
    } 
    
    function decrypt($sData, $sKey='mysecretkey'){ 
        $sResult = ''; 
        $sData   = decode_base64($sData); 
        for($i=0;$i<strlen($sData);$i++){ 
            $sChar    = substr($sData, $i, 1); 
            $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1); 
            $sChar    = chr(ord($sChar) - ord($sKeyChar)); 
            $sResult .= $sChar; 
        } 
        return $sResult; 
    } 
    
    
    function encode_base64($sData){ 
        $sBase64 = base64_encode($sData); 
        return strtr($sBase64, '+/', '-_'); 
    } 
    
    function decode_base64($sData){ 
        $sBase64 = strtr($sData, '-_', '+/'); 
        return base64_decode($sBase64); 
    }  

/////////////////////////////
    
    public function reset(request $request)
    {
   




        $email = $request->email;
        $id = DB::table('users')->where('email',$email)->value('id');
        $tel = DB::table('users')->where('email',$email)->value('phone');

        $id = encrypt($id, $sKey='mysecretkey');
        


        $link="www.lifewithgoals.com/resetPass/".$id;

        DB::table('notifications')->insert(
            [
              'to'=> $email,
              'subject' => 'Reset',
              'message'=> $link,
              'template_name'=>'reset',
              'message_type'=>1,
            ]
        );

        return view('goToEmail');
    
    }

    public function confirmResetGET($id)
    {
     
        $id= decrypt($id, $sKey='mysecretkey');
        return view('passwordChange',['id'=>$id]);
    
    }

    public function confirmResetPOST(request $request)


    {
        $ID = $request->idForPass;
      
        $newPass =  $request->passwordReset;
        DB::table('users')->where('id',$ID )->update(['password' =>  bcrypt($newPass)]);
       
  
        Auth::loginUsingId($ID);
        
            if(Auth::check()){
        
               
                return redirect()->to(url('dashboard'));
            }
            return redirect ('/');
        
    
    }
 

    public function loginUsingId($id, $remember = false)
    {
        $this->session->set($this->getName(), $id);
        $this->login($user = $this->provider->retrieveById($id), $remember);
        return $user;
    }

}
