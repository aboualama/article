<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Articledatatable;
use App\Article;
use App\Category;
use App\Comment;
use Mail;
use DB;
use Auth;


class WebController extends Controller
{
   
    
    public function index()
    {   
        $articles  =  Article::orderBy('created_at', 'asc')->paginate(8); 
        return view('index' , compact('articles'));
 
    }



    public function show($id)
    {
        
        $article          = Article::where('id' , $id)->first();  
        $cat_id           = DB::table('articles')->where('id' , $id)->value('subcategory_id');
        $relative_article = Article::where('subcategory_id' , $cat_id)
                                   ->where('id' ,'!=' , $id) 
                                   ->inRandomOrder()->limit(3)->get();  
        return view('item' , compact('article' , 'relative_article'));

    }  




    public function Commentstore(Request $request)
    {
        $user_id = Auth::user()->id ; 
        $data = $this->validate(request(), [ 
                    'name'   => 'required|string|min:6|max:255',
                    'body'   => 'required|string',  
            ]);  
        $data['name']       = $request->name;     
        $data['body']       = $request->body;   
        $data['article_id'] = $request->article_id;     
        $data['user_id']    = $user_id;     

         
        Comment::create($data);
        return response()->json($data);
         

    }     




    public function category($slug)
    { 
        $name     = str_replace('-',' ', strtolower($slug)); 
        $id       = Category::where('name' , $name)->value('id'); 
        $category = Category::find($id); 
        
        return view('categories'  , compact('category'));
    }



    public function allcategory()
    { 
         
        $AllCategory = Category::all();         
 
        return view('Allcategories'  , compact('AllCategory'));
    }
 



    public function subcategory($slug)
    { 
        $name       = str_replace('-',' ', strtolower($slug));  
        $cat_id     = DB::table('sub_categories')->where('name' , $name)->value('id');
        $cat_name   = DB::table('sub_categories')->where('id' , $cat_id)->first(); 
        $articles   = Article::orderBy('created_at', 'asc')->where('subcategory_id' , $cat_id)->get(); 

        
        return view('subcategories'  , compact('articles' , 'cat_name'));
    }





    public function contact(Request $request) {
        
        $this->validate($request, [ 
            'email'   => 'required|email' ]);

        $data = array( 
            'email'       => $request->email, 
            );

        Mail::send('emails.contact_temp', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aboualama@gmail.com');
            $message->subject($data['email']);
        });

        // Session::flash('success', 'Your Email was Sent!');

        return redirect('/contact')->with('message', 'Your Email Was Sent Successfully ! ');
    }

 
}
