@extends('index')
@section('content')
 


@if(isset($profile))
    <h1 class="text-danger">Update Post</h1>
    {{Form::model($profile,['route'=>['profile.edit', $profile->user_id],'method'=>'put'])}}
@else
     <h1 class="text-danger">Create a New post</h1>
    {{Form::open(['route'=>'profile.edit', 'method'=>'post','role'=>'form','edit'=>'profile_form','class'=>'form',
    'enctype'=>'multipart/form-data'])}}
@endif

    <div class="">
        <h1>{{Auth::user()->name}}</h1>
    
    </div>

    
    <div class="form_group col-sm-5 {{$errors->has('address')?' has-error': ''}}">
        <label for="addressInput">Address:
            {{ Form::text('address',null,['class'=>'form-control',
            'id'=>'addressInput']) }}
        </label>
        <span class="text-danger ">{{$errors->first('address')}}</span>
    </div>

    <div class="form-group col-sm-5 {{$errors->has('birthdate')?' has-error': ''}}">
        <label for="birthdateInput">Birth Date:
            {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdateInput']) }}
        </label>
        <span class="text-danger">{{$errors->first('birthdate')}}</span>
    </div>

    <div class="form-group col-sm-5 {{$errors->has('prof_pic')?' has-error': ''}}">
        <label for="fileInput">
            {{ Form::file('prof_pic',null, ['class'=>'form-control file',
            'id'=>'fileInput']) }}
        </label>
        <span class="text-danger">{{$errors->first('prof_pic')}}</span>
    </div>

    
    <div class="form-group col-sm-5">
    {{Form::submit('Edit Details', array('class'=>'btn btn-lg btn-primary'))}}
   
 

    <script >
        $(function() {
            var inputSelector=$('input');
            if(inputSelector.val().toString().length==0){
                inputSelector.attr('disabled','disabled');
            }
    
        })
    </script>

@endsection