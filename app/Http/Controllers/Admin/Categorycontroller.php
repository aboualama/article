<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Articledatatable;
use App\Article;
use App\Category;
use App\Subcategory;
use DB;


class Categorycontroller extends Controller
{
    public function index()

    {   
        $categories  =  Subcategory::orderBy('created_at', 'asc')->paginate(8); 

        return view('admin.category.categories' , compact('categories'));
 
    }

 


    public function create()
    {
        $cats   = Category::all() ; 
        return view('admin.category.Addcategory' , compact('cats'));
    }

 


    public function store(Request $request)
    {

        $data = $this->validate(request(), [ 
                    'name'           => 'required|string|max:255',  
                ],[],[ 
                    'name'           => 'Subcategory Name',  
                ]);        
        $data['category_id'] = $request->category;    
        $data['name']        = $request->name;  
         
        Subcategory::create($data);
        return redirect ('/admin/category');
 
    }        



 
    public function show($id)
    {
         
        $category   = Subcategory::where('id' , $id)->first();
        return view('admin.category.category' , compact('category'));
    }



 
    public function edit($id)
    {
         $cats   = Category::all() ;  
         $subcategory   = subcategory::find($id); 
         return view('admin.category.Editcategory', compact('subcategory' , 'cats' , 'cat'));     
    }



 
    public function update(Request $request, $id)
    {

        $data = $this->validate(request(), [
                    'name'  => 'required|string|max:255',  
                ],[],[ 
                    'name'  => 'Subcategory Name',  
                ]); 
        $data['name']        = $request->name;
        $data['category_id'] = $request->category;  
  
        $category = Subcategory::find($id);
        $category->update($data);
        return redirect ('/admin/category');

    } 

    public function destroy($id)
    {
        
        Subcategory::find($id)->delete(); 
        return back();
    } 
}
