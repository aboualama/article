@extends('admin.inc.layouts')

@section('title')
 Edit Article

@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Article

        <small>Cpanel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li><a href="#">{{ $article->title }}</a></li> 
      </ol>
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Name</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 

            @include('errors.error')

            {!! Form::open(['url' => 'admin/article/'.$article->id, 'class' => 'form-group', 'files' => true]) !!}
            {{ method_field('PUT') }}{{csrf_field()}}
                <div class="form-group">
                    {!! Form::label('Article Title') !!}
                    {!! Form::text('title', $article->title , ['class' => 'form-control']) !!} 
                </div>

                <div class="form-group">
                    {!! Form::label('Article Content') !!}
                    {!! Form::textarea('content', $article->content , ['class' => 'form-control ckeditor']) !!}
                </div>
 
                   
                <div class="form-group">
                    {!! Form::label('Article Image') !!}
                    {!! Form::file('photo', ['class' => 'form-control']) !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('Article Category') !!}
                      <select  class="form-control" name="subcategory"> 
                        <option selected  value="{{ $article->subcategory->id  }}">{{ $article->subcategory->name }}</option>

                            @foreach($AllCategory as $category)   
                                    <optgroup label="{{ $category->name }}  "> 
                                        @foreach($category->subcategories as $subcategory)  
                                          <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option> 
                                        @endforeach
                                             
                            @endforeach 

                      </select> 
                </div>

                <div class="form-group">
                    {!! Form::submit('Edit Article!', ['class' => 'form-control btn btn-block btn-success']) !!}
                </div>
                {!! Form::close() !!}
           
              </table>
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