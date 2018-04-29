@extends('admin.inc.layouts')

@section('title')

{{ $category->name }}
@endsection

@section('content')

 

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        The Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> {{ $category->name }}  </li> 
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
                  <h3>
                      {{ $category->name }}
                  </h3> 
          
                      <a class="btn" href="{{ URL::previous() }}">Back</a> 
           
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