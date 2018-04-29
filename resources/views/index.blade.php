@extends('layouts.app')


 @section('content')

     
 

    <!-- Main content -->
    <section class="content ">
    <div class="container">
	     <div class="row">
	        <div class="col-xs-12 text-center" >  
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">The Articles</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body ">
	              	<table id="example2" class="table table-bordered table-hover"> 
			            <thead>
			              <tr>
			                <th>#</th>
			                <th>Article Name</th>
			                <th>Article Content</th>
			                <th>Article Subcategory</th> 
			                <th>Article Photo</th> 
			              </tr>
			            </thead>
			            <tbody>

				            @foreach ($articles as $article) 
				              <tr>
				                <th scope="row"> {{ $article->id }}</th>
				                <td> <a href="/article/{{ $article->id }}">{{ $article->title }}</a> </td> 
				                <td>{!! str_limit( strip_tags($article->content)   , 100 , $end = '   ..... ') !!}  </td> 
				                <td>{{ $article->subcategory->name }}  </td> 
				                <td> <img src="/uploads/{{ $article->photo }}" width="50" height="50" class="center-block"> </td> 
				              </tr>
				            @endforeach   

			            </tbody>
			    	</table>
	    
	        {!! $articles->render() !!}
	           
	              
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	 
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->
	      </div>
      <!-- /.row -->
    </div>

    </section>
    <!-- /.content -->


 @endsection