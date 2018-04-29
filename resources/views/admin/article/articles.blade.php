@extends('admin.inc.layouts')

@section('title')

All Articles

@endsection

@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Articles
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> The Articles  </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">The Articles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 
            <thead>
              <tr>
                <th>#</th>
                <th>Article Name</th>
                <th>Article Content</th>
                <th>Article Photo</th>
                <th>Edit</th>
                {{-- <th>Delete</th> --}}
              </tr>
            </thead>
            <tbody>

            @foreach ($articles as $article)
           
              <tr>
                <th scope="row"> {{ $article->id }}</th>
                <td> <a href="/admin/article/{{ $article->id }}">{{ $article->title }}</a> </td> 
                <td>{!! str_limit( strip_tags($article->content)   , 100 , $end = '   ..... ') !!}  </td> 
                <td> <img src="/uploads/{{ $article->photo }}" width="50" height="50" class="center-block"> </td>
                <td> <a href="/admin/article/{{ $article->id }}/edit" class="btn btn-primary">Edit</a> </td> 
       {{--          <td> 
                    {{ Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $article->id]]) }}
                      {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td> --}}
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
    </section>
    <!-- /.content -->

 



@endsection