@extends('admin.inc.layouts')

@section('title')

{{ $article->title }}

@endsection

@section('content')

 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         {{ $article->title }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> The Article  </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">The Article</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 

              <img alt="{{ $article->title }}" src="/uploads/{{ $article->photo }}" style="width: 100%; height: 300px;" />
 
              <div class="caption">
                  <h3>
                      {{ $article->title }}
                  </h3>
                  <p>
                      {{ $article->content }}
                  </p>
 
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