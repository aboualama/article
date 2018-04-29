<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $article->title }} </title>
    <!-- favicon-->
    <link rel="shortcut icon" href="{{ asset('/uploads') }}/images/favicon.ico" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/web') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/web') }}/plugins/owl-carousel/css/owl.carousel.min.css">

    <!-- Custom Style-->
    <link rel="stylesheet" href="{{ asset('/web') }}/css/custom.css">
</head>

<body class="text-left">

    
    <!-- Start Section Head Pages -->
    <section id="head-pages" style="background-image: url({{ asset('/uploads') }}/{{ $article->photo }});">
        <div class="container">
           <div class="row">
               <div class="col-sm-12 text-center">
                   <h2 class="text-uppercase font-weight-bold"> {{ $article->title }}</h2>
               </div>
           </div>
        </div>
    </section>
     <!-- End Section Head Pages -->
     
 <div class="container "> 
    <div class="row">
        <div class="col-sm-12 text-left my-4">
          <h3>Author: {{$article->admin->name}}<span style="width: 100px"></span> Catgory: {{ $article->subcategory->name }}</h3> 
            <hr>
                {!! $article->content  !!} 
        </div>
    </div> 


    <hr>

    @guest
        <h3 class=" text-center" >You Must Sing Up To Leave Comment</h3> 
    @else
        <div class="form-group"> 
            <form action="/article/comment" method="post" class="form-control">
                <h3 class=" text-center" > Leave Comment</h3> 
                {{csrf_field()}}
                    <input type="text" name="name" required="Name" class="form-control text-left" placeholder="Your Name">
                    <input type="hidden" name="article_id" value="{{ $article->id }}" class="form-control">  
                    <textarea name="body" required="" class="form-control text-left" placeholder="Your Comment"></textarea>
                    <input type="submit" value="Send Comment" class="form-control btn btn-primary">
            </form>
        </div>
    @endguest 


    <hr>

    <div class="box-body">
        <h3>The Comments</h3>
      <table id="example2" class="table table-bordered table-hover"> 
          <thead>
            <tr>
              <th >#</th>
              <th>User Name</th> 
              <th>Comment Massege</th>
            </tr>
          </thead>
          <tbody>
        @php $i = 1; @endphp
            @foreach ($article->comments as $comment)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{ $comment->name }}</td>
                  <td>{{ $comment->body }}</td>
                </tr>  
            @endforeach
          </tbody>
      </table>  
    </div> 
</div>


     
<div class="container ">
    <div class="row"> 

        @foreach($relative_article as $rel_art)

            <div class="col-md-4 col-sm-12">
                <div style="background-color: #fff; padding: 10px">
                    <h2>{{ $rel_art->title }}</h2>
                    <img src="{{ url(asset('/uploads')) }}/{{ $rel_art->photo }}" class=" img-thumbnail center-block ">
                    <p class="lead">{!! str_limit( strip_tags($article->content)   , 100 , $end = '   ..... ') !!} </p>
                    <a href="{{ url('/') }}/article/{{ $rel_art->id }}" class="btn btn-primary">Read More &rarr;</a> 
                </div>
            </div>
        
        @endforeach

    </div>
    <a href="{{ URL::previous() }}" class="btn btn-success pull-right">Back</a>
</div>

</body>

</html>