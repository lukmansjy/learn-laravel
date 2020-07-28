<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
        return view('posts.create', ['post' => new Post()]);
    }

    // public function store(Request $request){
    //     // vaidation
    //     $this->validate($request, [
    //         'title' => 'required|min:3|max:110',
    //         'body' => 'required'
    //     ]);

    //     // # Create data model 1
    //     // $post = new Post;
    //     // $post->title = $request->title;
    //     // $post->slug = Str::slug($request->title);
    //     // $post->body = $request->body;

    //     // $post->save();

    //     // # create data model 2
    //     Post::create([
    //         'title' => $request->title,
    //         'slug' => Str::slug($request->title),
    //         'body' => $request->body
    //     ]);

    //     // # create data model 3 (Not recommended)
    //     // $post = $request->all();
    //     // $post['slug'] = Str::slug($request->title);
    //     // Post::create($post);

    //     return redirect()->to('post');

    // }

    // store clean code
    public function store(PostRequest $request){
        $attr = $request->all();
        $attr['slug'] = Str::slug(request('title'));
        Post::create($attr);
        session()->flash('success', 'Add post success');
        return redirect()->to('post');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post){
        $attr = $request->all();
        $post->update($attr);
        session()->flash('success', 'Update post success');
        return redirect()->to("post/$post->slug");
    }

    public function validateRequest(){
        return request()->validate([
            'title' => 'required|min:3|max:110',
            'body' => 'required'
        ]);
    }
}
