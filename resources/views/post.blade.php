@extends('index')
@section('content')
 

@if(isset($post))
    <h1 class="text-danger">Update Post</h1>
    {{Form::model($post,['route'=>['post.update', $post->id],'method'=>'put'])}}
@else
     <h1 class="text-danger">Create a New post</h1>
    {{Form::open(['route'=>'post.add', 'method'=>'post'])}}
@endif
   <div class="form-group {{$errors->has('title')?' has-error': ''}}">
     <label for="title">
           {{Form::text('title',
           null, array('class'=>'form-control'))}}
       </label><br>
       <span class="text-danger">{{$errors->first('title')}}</span>
   </div>
   
   <div class="form-group {{$errors->has('content')?' has-error':''}}">
     <label for="content">
           {{Form::textarea('content',
           null, array('class'=>'form-control'))}}
       </label>
       <span class="text-danger">{{$errors->first('content')}}</span>
   </div>
   
  <div class="form-group">
    {{Form::submit('submit', array('class'=>'btn btn-lg btn-primary'))}}
    <input type=reset name="reset" value="Clear" class="btn btn-lg btn-warning"/>
  </div>
{{Form::close()}}
@endsection