<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::get(['slug', 'title', 'body']); // Get all
        // $posts = Post::take(3)->get(['slug', 'title', 'body']); // get 3
        // $posts = Post::SimplePaginate(5);
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
}
