@extends('layouts.pagelayout')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 mt-4">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488799.4874567493!2d95.90137127249074!3d16.83895248154439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2sus!4v1616768772261!5m2!1sen!2sus" width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
		<div class="col-md-6 mt-4">
			<!-- Default form login -->
			<form class="text-center border border-light p-5" action="{{route('postContactMessage')}}" method="POST">
			@csrf
				<p class="h4 mb-4">Contact Us</p>
				<!-- User Name -->
				<input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="User Name" name="username">
				@error('username')
					<p class="text-danger">{{$message}}</p>
				@enderror
				<!-- Email -->
				<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
				@error('email')
					<p class="text-danger">{{$message}}</p>
				@enderror
				<!-- Password -->
				<textarea id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Message" name="message"></textarea>
				@error('message')
					<p class="text-danger">{{$message}}</p>
				@enderror
				<!-- Sign in button -->
				<button class="btn btn-info btn-block my-4" type="submit">Sent Message</button>
			</form>
			<!-- Default form login -->
		</div>
	</div>
</div>
@endsection