@extends('index')
@section('content')
	<h1>My Profile</h1>
	<style type="text/css">
	img{
		width:100px;
		height:100px;
		max-height:300px;
		max-width:200px;
		border-radius: 50%;
		position: right;
		float: relative;

	}
		
	</style>
	
		<div class="jumbotron col-sm-6">
			<div class="alert-default">
				@foreach ($profile as $profile)
				<img src="{{asset('storage/avatars/'.$profile->prof_pic) }}"
				 alt="My Prof Pic"/>
				 <br>
			<!-- 	<span class="text-success">
					Name:<strong>{{ Auth::user()->name}}</strong>
				</span>
				<br/>
				<span class="text-info">
					Email:<strong>{{ Auth::user()->email}}</strong>
				</span><br/>
				
				<span class="text-success text-capitalize">
					Address:<strong>{{ $profile->address}}</strong>
				</span>
				<br/>
				<span class="text-success">
					Age:<strong>{{ $profile->age}}</strong>
				</span>
				<br/>
				<span class="text-success">
					Date of Birth:<strong>{{ $profile->birthdate}}</strong>
				</span> -->
				@endforeach
				
			</div>
				<!-- <td><a  class="btn btn-primary" href="{{route('profile.edit_details',$profile->id)}}">Edit Profile</a></td> -->
<td><a  class="btn btn-primary" href="{{route('profile.changePhoto')}}">Change Profile</a></td>
	
		</div>
@endsection