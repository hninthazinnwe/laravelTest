@extends('layouts.pagelayout')
@section('content')
    <img src="{{asset('images/background.jpg')}}" width="1520" height="300"  />
    <div class="container">
    <h2 class="mt-3">All Posts</h2>
  <div class="row">
      @foreach($posts as $post)
        <div class="col-md-4 mt-3">
        <!-- Card -->
        <div class="card">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="{{asset('images/profiles/'.$post->image)}}"
                alt="Card image cap" height="200">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <p class="card-title">{{$post->title}} (Posted by {{$post->user->name}})</p>
                <!-- Text -->
                <!-- <p class="card-text">{{$post->content}}</p> -->
                <!-- Button -->
                <a href="{{route('showPostById', $post->id)}}" class="btn btn-primary">See More</a>
                <!-- <a href="{{url('/post/$post->id')}}" class="btn btn-primary">Button</a> -->

            </div>

        </div>
        </div>
        @endforeach
    </div>
    </div>

    </div>
@endsection