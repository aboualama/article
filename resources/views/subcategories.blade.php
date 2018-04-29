@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category: {{ $cat_name->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



@if($articles->count() > 0)
 
   @foreach ($articles as $article)
        <!-- Blog article -->
        <div class="card mb-4 post"> 
          <h2 class="card-title"><a href="{{ url('/') }}/article/{{ $article->id }}" >{{ $article->title }}</a></h2> 
          <div class="card-footer text-muted">
 
          <div >
            <span> <strong> Posted on: </strong> {{ $article->created_at->format('Y-m-d') }} </span>  
            <span style="margin-left: 50px;" ><strong> Author: </strong> {{ $article->admin->name }}  </span> 
            <span style="margin-left: 50px;" ><strong> Catgory: </strong> {{ $article->subcategory->name }}  </span>   
          </div>
          </div> 
          <img class="card-img-top img-thumbnail img-responsive" src="{{ url('/') }}/uploads/{{ $article->photo}} "  alt=" " style="width: 750px; height: 300px">
          <div class="card-body"> 
            <p class="card-text">{!! str_limit( strip_tags($article->content)   , 200 , $end = '  ..... ') !!}</p> 
            <a href="{{ url('/') }}/article/{{ $article->id }}" class="btn btn-primary">Read More &rarr;</a>
          </div>

        </div>
        <hr>
  @endforeach
   
@else
  
  <div class="alert alert-danger"> <strong>Sorry</strong> There is No Articles In This Category</div>

@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
