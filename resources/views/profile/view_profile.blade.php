@extends('index')
@section('content')
<h1>My Profile</h1>
<style>
img{
	width: 50px;
	height: 50px;
	max-height: 300px;
	max-width: 200px;
	border-radius: 50%;
	float: right;
	position: relative;
}
</style>
<div class=" col-sm-6">
	<div class="alert-success">
		 @foreach(Auth::user()->photos as $photo)
    @if($photo->status=='Current')
     <img src="{{ $photo->prof_pic }}" class="image" alt="Display Photo"  />
     <div class="form-group">
        <button id="upload_pic" class="btn btn-small btn-primary">Upload Photo</button>
        <button id="select_pic" class="btn btn-small btn-secondary">Select from Gallery</button>
     </div>
    @endif
    @endforeach
		<span class="text-success">Name:
			<strong> {{ Auth::user()->name }}</strong>
		</span><br>
		<span class="text-info">Email:
			<strong> {{ Auth::user()->email }}</strong>
		</span><br>
		
		<br>
		<span class="text-success text-capitalize">Address:
			<strong> {{ $profile->address }}</strong>
		</span><br>
		<span class="text-success">Age:
			<strong> {{ $profile->age }}</strong>
		</span><br>
		<span class="text-success">Date of Birth:
			<strong> {{ $profile->birthdate }}</strong>
		</span>
		
	</div>
	
</div>
@endsection