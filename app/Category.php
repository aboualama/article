<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $table = 'categories';
	
    protected $fillable = [ 'name' ];



    public function subcategories(){

	return $this->hasMany(Subcategory::class , 'category_id');
	
	}


   public function articles(){

	return $this->hasManyThrough(Article::class, Subcategory::class);
	
	}
}
 