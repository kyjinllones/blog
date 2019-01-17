<html>
<head>
 {{Html::style('css/app.css')}}
 <meta name="_token" content="{{csrf_token()}}" />
 {{Html::script('js/jquery-min.js')}}

</head>
<body>
<div class="container">
    <div class="row">
        <div class="jumbotron col-md-7">
            {{Form::open(['route'=>'post.find','method'=>'get','class'=>'form-inline'])}}
            @csrf
             <input type="search"
                    class="text-success" name="search" placeholder="Search Title"/>
            {{Form::close()}}
        </div>
        <div class="col-md-7">
            @yield('content')
        </div>
    </div>
</div>
 {{Html::script('js/app.js')}}
 {{Html::script('js/custom.js')}}
 {{Html::script('js/comment-ajax.js')}}
 </body>
</html>