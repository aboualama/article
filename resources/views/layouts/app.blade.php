<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                      <ul class="nav navbar-nav"> 
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                          <ul class="dropdown-menu"> 
                
                        
                                @foreach($some_Category as $category)

                                    @if ( $category->Subcategories()->count() == 0 )
                                    <li><a href="#">{{ $category->name }}</a></li> 
                                    @endif

                                    @if ( $category->Subcategories()->count() > 0 ) 
                                            <li class="dropdown-submenu">  
                                                <a tabindex="-1" href="{{ url('/category') }}/{{ str_replace(' ','-', strtolower( $category->name)) }}">  {{ $category->name }} </a>
                                                    <ul class="dropdown-menu"> 
                                                        @foreach($category->Subcategories as $subcategory) 
                                                            <li>
                                                                <a href="{{ url('/subcategory') }}/{{  str_replace(' ','-', strtolower( $subcategory->name)) }} ">{{ $subcategory->name }}</a>
                                                            </li> 
                                                        @endforeach 
                                                    </ul> 
                                            </li>   
                                    @endif 
                                @endforeach 
                                <li>
                                    <a href="{{ url('/allcategory') }}">More ...</a>
                                </li>  
                          </ul>
                        </li>
                        <li><a href="{{ route('contact') }}"> Contact </a></li>
                    </ul>   
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li style="float: left; margin-top: 10px">
                            <img src="{{ url('/uploads/user') }}/{{ Auth::user()->img }}" class="img-circle"  style="width: 30px; height: 30px">
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
 
    </script>
</body>
</html>
