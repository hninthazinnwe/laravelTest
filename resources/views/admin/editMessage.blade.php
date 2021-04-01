<x-adminlayout>
<!-- Default form login -->
<form class="text-center border border-light p-5" action="{{route('updateMessage', $updateData->id)}}" method="POST">
@csrf
	<p class="h4 mb-4">Update Message</p>
	<!-- User Name -->
	<input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="User Name" value="{{$updateData->username}}" name="username">
	@error('username')
		<p class="text-danger">{{$message}}</p>
	@enderror
	<!-- Email -->
	<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" value="{{$updateData->email}}" name="email">
	@error('email')
		<p class="text-danger">{{$message}}</p>
	@enderror
	<!-- Password -->
	<textarea id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Message" name="message">{{$updateData->message}}</textarea>
	@error('message')
		<p class="text-danger">{{$message}}</p>
	@enderror
	<!-- Sign in button -->
	<button class="btn btn-info btn-block my-4" type="submit">Update Message</button>
</form>
<!-- Default form login -->
</x-adminlayout>