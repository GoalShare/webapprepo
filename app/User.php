<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  	protected $table = 'users';
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password','lname','gender','dob','phone','avatar','countrycode','bio','role','id','name','usercover','aboutmetext',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        ];

 	// user has many posts
 	public function posts()
 	{
 		return $this->hasMany('App\Posts','author_id');
 	}

 	// user has many comments
 	public function comments()
 	{
 		return $this->hasMany('App\Comments','from_user');
 	}

 	public function can_post()
 	{
 		$role = $this->role;
 		if($role == 'author' || $role == 'admin')
 		{
 			return true;
 		}
 		return false;
 	}

 	public function is_admin()
 	{
 		$role = $this->role;
 		if($role == 'admin')
 		{
 			return true;
 		}
 		return false;
 	}

    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function post(){
        return $this->hasMany('App\Posts');
    }
}
