@extends('admin.inc.layouts')

@section('title')

All category

@endsection

@section('content')

  
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category List
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Categories  </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">The Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 
 
            <thead>
              <tr>
                <th>#</th>
                <th>Subcategory Name</th>  
                <th>Category Name</th>  
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($categories as $subcategory)
           
              <tr>
                <th scope="row"> {{ $subcategory->id }}</th>
                <td> <a href="/admin/category/{{ $subcategory->id }}">{{ $subcategory->name }}</a> </td> 

                <td>  {{ $subcategory->category['name'] }} </td> 
                
                <td> <a href="/admin/category/{{ $subcategory->id }}/edit" class="btn btn-primary">Edit</a> </td> 
                <td> 
                    {{ Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $subcategory->id]]) }}
                      {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
              </tr>
            @endforeach


           

            </tbody>
          </table>
    
        {!! $categories->render() !!}
           
           
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