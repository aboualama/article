@extends('admin.inc.layouts')

@section('title')

Edit category

@endsection

@section('content')
 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $subcategory->name}}
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Edit category </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 

           @include('errors.error')

             {!! Form::open(['url' => '/admin/category/'.$subcategory->id, 'class' => 'form-group']) !!}
                {{ method_field('PUT') }}{{csrf_field()}}
                
                <div class="form-group">
                    {!! Form::label('Product Name') !!}
                    {!! Form::text('name',  $subcategory->name  , ['class' => 'form-control']) !!}  
 
                </div>
 
                <div class="form-group">
                    {!! Form::label('Category') !!}
                      <select  class="form-control" name="category"> 
                        <option selected  value="{{ $subcategory->category->id  }}">{{ $subcategory->category->name }}</option>

                            @foreach($cats as $category)    
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>  
                            @endforeach 

                      </select> 
                </div>
 
                <div class="form-group">
                    {!! Form::submit('Edit category!', ['class' => 'form-control btn btn-block btn-success']) !!}
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