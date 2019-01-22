<html>
<head>
 {{Html::style('css/app.css')}}
 <meta name="_token" content="{{csrf_token()}}" />
 {{Html::script('js/jquery-min.js')}}
 <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<nav class="navbar  navbar-dark navbar-expand bg-secondary">
    <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <ul class="navbar-nav ml-auto">
                        
                <li>
                     {{Form::open(['route'=>'post.find','method'=>'get','class'=>'form-inline'])}}
                    @csrf
                    <input type="search"
                    class="form-control" name="search" placeholder="Search Blog" required />
                    {{Form::close()}}
                </li> &nbsp;&nbsp;&nbsp;&nbsp;
                

                    <div>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                 
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                    </ul>
   
    </div>
</nav>
<div class="col-md-7">
            @yield('content')
</div>
 {{Html::script('js/app.js')}}
 {{Html::script('js/custom.js')}}
 {{Html::script('js/comment-ajax.js')}}
 </body>
</html>