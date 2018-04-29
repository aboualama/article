@extends('admin.inc.layouts')

@section('title')

Add New category

@endsection

@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New Category
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> New Category  </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 

            @include('errors.error')

            {!! Form::open(['url' => 'admin/category', 'class' => 'form-group']) !!}

                <div class="form-group">
                    {!! Form::label('Subcategory Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!} 
                </div>
 
                
                <div class="form-group">
                    {!! Form::label('Category') !!}
                      <select  class="form-control" name="category"> 
                        <option selected>Choose...</option>

                            @foreach($cats as $category)    
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>  
                            @endforeach 

                      </select> 
                </div>
 

                <div class="form-group">
                    {!! Form::submit('Create New category!', ['class' => 'form-control btn btn-block btn-success']) !!}
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