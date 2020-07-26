<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::get(['slug', 'title', 'body']); // Get all
        // $posts = Post::take(3)->get(['slug', 'title', 'body']); // get 3
        // $posts = Post::SimplePaginate(5);
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;

        $post->save();
        return redirect()->to('post');

    }
}
