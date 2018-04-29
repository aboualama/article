<?php 

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View; 
use Auth;
use App\Category;

class ViewComposer {

    public function compose(View $view) {
  

   		$view->with('admin', Auth::guard('admin')->user() ); 
		$view->with('some_Category', Category::inRandomOrder()->limit(5)->get());   
		$view->with('AllCategory', Category::all() );
 
    }
}