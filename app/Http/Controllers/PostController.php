<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function showPostById($id){
        $post=Post::find($id);
        return view('user.showPost', ['post'=>$post]);
    }
    function deletePost($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('message', 'Post Deleted!');
    }
    function editPost($id){
        $post=Post::find($id);
        return view('user.editPost', ['post'=> $post]);
    }
    function post(){
        $validation = Request()->validate([
            "title"=>"required",
            "image"=>"required",
            "content"=>"required",
        ]);

        if($validation){
            $title = $validation['title'];
            $image = $validation['image'];
            $content = $validation['content'];

            $image_name = uniqid()."_".Request('image')->getClientOriginalName();
            $image->move(public_path('images/profiles'), $image_name);
            
            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->title = $title;
            $post->content = $content;
            $post->image = $image_name;
            $post->save();

            return redirect()->route('home')->with("message", "added new post!");
        }else{
            return back()->withErrors($validation);
        }
    }
    function updatePost($id){
        $validation = Request()->validate([
            "title"=>"required",
            "content"=>"required",
        ]);

        $title = request('title');
        $image = request('image');
        $content = request('content');

        $post=Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->title = $title;
        $post->content = $content;
        
        if($image){
            $image_name = uniqid()."_".Request('image')->getClientOriginalName();
            $image->move(public_path('images/profiles'), $image_name);
            $post->image=$image_name;
            $post->update();

            return back()->with("message", "post updated!");
        }
        $post->update();
        return back()->with("message", "post updated!");
    }
}
