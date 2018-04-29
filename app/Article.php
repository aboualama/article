<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
	protected $table = 'articles';

    protected $fillable = [ 'title', 'content', 'photo', 'subcategory_id', 'admin_id' ];

	

	public function category(){

	return $this->belongsTo(Category::class);
	
	}
    public function subcategory(){ 
    	return $this->belongsTo(Subcategory::class);
    }

    public function admin(){
    	return $this->belongsTo(Admin::class);
    }

    public function Comments(){

        return $this->hasMany(Comment::class);
    }
}
 