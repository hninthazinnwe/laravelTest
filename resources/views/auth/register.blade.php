@extends('layouts.authlayout')
@section("content")
  <div class="container">
    <div class="col-md-4 offset-4 mt-5">
      <div class="card">
      <h5 class="card-header pink white-text text-center py-4">
        <strong>Register</strong>
      </h5>
      <div class="card-body px-lg-5 pt-0">
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route('post_register')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-row">
            <div class="col">
              <!-- userName -->
              <div class="md-form">
                <input type="text" id="materialRegisterFormFirstName" class="form-control" name="username" value="{{old('username')}}">
                <label for="materialRegisterFormFirstName">User name</label>
                @error("username")
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <!-- E-mail -->
              <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control" name="email" value="{{old('email')}}">
                <label for="materialRegisterFormEmail">E-mail</label>
                @error("email")
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <!-- Password -->
              <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" name="password" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword">Password</label>
                <!-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4"> -->
                <!-- At least 8 characters and 1 digit -->
                <!-- </small> -->
                @error("password")
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <!-- confirmPassword -->
              <div class="md-form">
                <input type="password" id="confirmPassword" class="form-control" name="password_confirmation" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="confirmPassword">Confirm Password</label>
                <!-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4"> -->
                <!-- At least 8 characters and 1 digit -->
                <!-- </small> -->
                @error("password_confirmation")
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <!-- FileUpload -->
              <label for="materialRegisterFormImage">Select your Profile Picture</label>
              <div class="md-form">
                <input type="file" id="materialRegisterFormImage" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="image">
                @error("image")
                <p class="text-danger">{{$message}}</p>
                @enderror  
              </div>

              <!-- Sign up button -->
              <button class="btn btn-outline-pink btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>

              <!-- Register -->
              <p>
              <a href="{{route('login')}}">Already Registered?</a>
              </p>
            </div>
          </div>
        </form>
        <!-- Form -->
      </div>
      </div>
    </div>
  </div>
@endsection