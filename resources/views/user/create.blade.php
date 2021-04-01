@extends('layouts.pagelayout')
@section('content')
  <div class="container">
    <!-- Default form login -->
    <form class="border border-light p-5 mt-5" action="{{route('createPost')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <p class="text-center h4 mb-4">Create Post</p>

      <!-- Title -->
      <label for="">Title</label>
      <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="title">

      <!-- file -->
      <label for="">Photo</label>
      <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="image">

      <!-- file -->
      <label for="">Content</label>
      <textarea id="defaultLoginFormPassword" class="form-control mb-4" name="content"> </textarea>

      <!-- Sign in button -->
      <button class="btn btn-info btn-block my-4" type="submit">Add Post</button>

    </form>
    <!-- Default form login -->
  </div>
@endsection