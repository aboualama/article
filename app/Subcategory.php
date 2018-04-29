<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'sub_categories';
	
    protected $fillable = [ 'name' , 'category_id' ];

	

	public function category(){

	return $this->belongsTo(Category::class);
	
	}
 
    public function articles(){

	return $this->hasMany(Article::class);
	
	}

}
