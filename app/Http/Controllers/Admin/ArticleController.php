<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Articledatatable;
use App\Article;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $articles  =  Article::orderBy('created_at', 'desc')->paginate(8); 

        return view('admin.article.articles' , compact('articles'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.AddNewArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id ;

        $data = $this->validate(request(), [
                    
                    'title'   => 'required|string|max:255',
                    'content' => 'required|string', 
                    'photo'   => 'required|image',  
            ]); 
      
        $data['title']          = $request->title;     
        $data['content']        = $request->content;   
        $data['subcategory_id'] = $request->subcategory;    
        $data['admin_id']       = $admin_id;    
        $data['photo']          = $request->photo->store('uploads'); 

         
        Article::create($data);
        return redirect ('/admin/article');

    }        


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $article   = Article::where('id' , $id)->first();
        return view('admin.article.article' , compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
      
         return view('admin.article.Editarticle', compact('article'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $admin_id = Auth::guard('admin')->user()->id ;

        $data = $this->validate(request(), [
                    
                    'title'   => 'required|string|max:255',
                    'content' => 'required|string',  
            ]); 
      
        $data['title']          = $request->title;     
        $data['content']        = $request->content;   
        $data['subcategory_id'] = $request->subcategory;    
        $data['admin_id']       = $admin_id;     
        
         if (request()->hasFile('photo')) {  
            $data['photo']       = $request->photo->store('uploads');       
         } 
 
     
        $article     = Article::find($id);
        $article->update($data);
        return redirect ('/admin/article');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        article::find($id)->delete();
        return back();
    }


}