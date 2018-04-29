@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category: {{ $category->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
  


@if($category->subcategories->count() > 0)
 
   @foreach ($category->subcategories as $subcategory)
         
        <div class="card mb-4 post"> 
          <h2 class="card-title"><a href="{{ url('/subcategory') }}/{{ str_replace(' ','-', strtolower( $subcategory->name)) }}" >{{ $subcategory->name }}</a></h2> 
  
        </div>
        <hr>
  @endforeach
   
@else
  
  <div class="alert alert-danger"> <strong>Sorry</strong> There is No Post In This Category</div>

@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
