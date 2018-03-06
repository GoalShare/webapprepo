<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    protected $table = 'posts';


	public function comments()
	{
		return $this->hasMany('App\Comments','on_post');
	}

	public function author()
	{
		return $this->belongsTo('App\User','author_id');
	}


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->belongsTo('App\Like');
    }


}
