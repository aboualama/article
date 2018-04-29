<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  	protected $table = 'comments';
	
    protected $fillable = [ 'name' , 'article_id' , 'user_id' , 'email' , 'body' ];

    public function articles(){

    	return $this->belongsTo(Article::class);
    }

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
