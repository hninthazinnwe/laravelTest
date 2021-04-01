@extends('layouts.pageLayout')
@section('content')
    <div class="container">
        <div class="mt-5">
            <h1>{{$post->title}}</h1>
            <img src="{{asset('/images/profiles/'.$post->image)}}" alt="" class="mt-3" width="600" height="400">
            <p class="mt-3">{{$post->content}}</p>
            @can('checkPremiumAdminPostOwner', $post->id)
                <a href="{{route('editPost', $post->id)}}" class="btn btn-success">Edit Post</a>
                <a href="{{route('deletePost', $post->id)}}" class="btn btn-danger">Delete Post</a>
            @endcan
        </div>
    </div>
@endsection
