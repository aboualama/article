@extends('layouts.app') 
 @section('content')
 
    <!-- Main content -->
<section class="content ">
	<div class="container">
		<div class="row"> 
			<div class="col-xs-12 text-center" >   
			@include('errors.error') 
				<div class="box">
					<div class="box-header">
					<h3 class="box-title">Contact <span>Form</span></h3>
					</div> 
					<hr>
					<div class="box-body ">  
						<div class="col-md-12 contact-form">  
							<form action="{{ url('/contact') }}" method="post"> 
							{{ csrf_field() }} 
						  		<div class="input-group" style=" width: 100%;">
				                 <input class="btn btn-lg" name="email" type="email" placeholder="Your Email" required style=" width: 300px;">
				                 <button class="btn btn-info btn-lg" type="submit" style="margin-left: 10px">Submit</button>
				              </div> 
							</form> 
						</div> 
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
</section> 

@endsection