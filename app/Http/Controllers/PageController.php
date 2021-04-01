<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index() {
        // $posts=Post::all();
        $posts=Post::latest()->get();
        return view("index", ['posts'=>$posts]);
    }
    function createPost() {
        return view('user.create');
    }
    function userProfile() {
        return view('user.userProfile');
    }
    function contactUs() {
        return view('user.contactUs');
    }
}
