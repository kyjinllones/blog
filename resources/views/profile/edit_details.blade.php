@extends('index')
@section('content')
<div class="jumbotron">
    <h1>{{ Auth::user()->name }}</h1>
    @foreach(Auth::user()->photos as $photo)
    @if($photo->status=='Current')
     <img src="{{ $photo->prof_pic }}" class="image" alt="Display Photo"  />
     <div class="form-group">
        <button id="upload_pic" class="btn btn-small btn-primary">Upload Photo</button>
        <button id="select_pic" data-toggle="modal" data-target="#myModal" class="btn btn-small btn-secondary">Select from Gallery</button>
     </div>
    @endif
    @endforeach

    <form id="dp_submission" method="post" class="form" action="{{ route('photo.upload') }}" enctype="multipart/form-data" role="form" >
        @csrf()
        <div>
            <label for="idp_upload">Upload Profile Picture:
                <input id="idp_upload" type="file" value="{{ old('prof_pic') }}" name="prof_pic" class="form-control" />
            </label><br>
            @if(isset($errors))
                <span class="text-danger"><strong>{{ $errors->first('prof_pic') }}</strong></span>
            @endif
        </div>
        <div>
            <input type="submit" value="Upload" class="btn btn-info"/>
        </div>
    </form>
</div>
{{ Form::open(['route'=>'profile.edit',
'role'=>'form','id'=>'profile_form', 'class'=>'form']) }}
<div class="form-group col-sm-5">
    <label for="addressInput">Address:
        {{ Form::text('address',null, ['class'=>'form-control address', 'id'=>'addressInput']) }}
    </label>
    <span class="text-danger">{{$errors->first('address')}}</span>
</div>
<div class="form-group col-sm-5">
    <label for="birthdateInput">Birth Date:
        {{ Form::date('birthdate',null, ['class'=>'form-control', 'id'=>'birthdateInput']) }}
    </label>
    <span class="text-danger">{{$errors->first('birthdate')}}</span>
</div>
<div class="form-group col-sm-5">
    <input type="submit" value="Edit Details" class="btn btn-secondary"/>
</div>
{{ Form::close() }}
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
          &times;</button>
          <h4 class="modal-title">Featuring Photos</h4>
        </div>
        <div class="modal-body">
        @foreach(Auth::user()->photos as $photo)
          <img src="{{ $photo->prof_pic }}" class="image" alt="Display Photo"  />
        @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<style>
img.image{
width: 12em;
height: 12em;
border-radius: 50%;
border-style: solid;
border-width: 0.2em;
border-color: white;
}
</style>
<script>
    $(function(){
        var inputSelector = $('input');
      
        if(inputSelector.val().toString().length==0){
            inputSelector.attr('disabled','disabled');
        }

        $("#upload_pic").click(function(){
            $("#dp_submission").fadeToggle(2000)
        })
    })
</script>

@endsection