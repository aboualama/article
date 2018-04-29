@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category List</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                     @foreach ($AllCategory as $category)
                          <!-- Blog article -->
                          <div class="card mb-4 post"> 
                            <h2 class="card-title">
                              <a href="{{ url('/category') }}/{{ str_replace(' ','-', strtolower( $category->name)) }}" >{{ $category->name }}</a>
                            </h2>  
                          </div>
                          <hr>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
