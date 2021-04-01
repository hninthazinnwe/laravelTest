@extends('layouts.pagelayout')
@section('content')
	<div class="container">
		<!-- Default form login -->
		<form class="border border-light p-5 mt-5" action="{{route('post_userProfile')}}" method="POST" enctype="multipart/form-data">
		@csrf
			<p class="text-center h4 mb-4">User Profile</p>
			@if(session('profileSuccess'))
				<div class="alert alert-success">
					{{session('profileSuccess')}}
				</div>
			@endif
			@if(session('profileError'))
				<div class="alert alert-danger">
					{{session('profileError')}}
				</div>
			@endif
			<!-- User Name -->
			<label for="">User Name</label>
			<input type="text" id="defaultLoginFormEmail" class="form-control mb-4" value="{{Auth()->user()->name}}" name="username">

			<!-- Email -->
			<label for="">Email</label>
			<input type="email" id="defaultLoginFormPassword" class="form-control mb-4" value="{{Auth()->user()->email}}" name="email">

			<!-- old Password -->
			<label for="">Old Password</label>
			<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="old_password">

			<!-- Password -->
			<label for="">New Password</label>
			<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="new_password">

			<!-- file -->
			<label for="">Photo</label>
			<input type="file" id="" class="form-control mb-4" name="image">
			<img src="{{asset('images/profiles/'.Auth()->user()->image)}}" width="300" height="200" />

			<!-- Sign in button -->
			<button class="btn btn-info btn-block my-4" type="submit">Update Profile</button>

		</form>
		<!-- Default form login -->
	</div>
@endsection