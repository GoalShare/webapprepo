<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|numeric|min:9',
            'dob' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'countrycode' => 'required|max:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      DB::table('notifications')->insert(
              [
                'to'=> $data['email'],
                'subject' => 'Welcome',
                'message'=> 'We warmly welcome you to lifewithgoals family',
                'template_name'=>'register',
                'message_type'=>1,
              ]
          );
        return User::create([
            'email' => $data['email'],
            'avatar'=> 'avatar.jpg',
            'fname'=>$data['fname'],
            'lname'=>$data['lname'],
            'dob'=>$data['dob'],
            'phone'=>$data['phone'],
            'countrycode'=>$data['countrycode'],
            'gender'=>$data['gender'],
            'password' => bcrypt($data['password']),
            'created_at'=> Carbon::now(),
        ]);

    }
}
