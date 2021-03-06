<?php

namespace App\Http\Controllers;

use App\{ Category, Post, Tag };
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }

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
        return view('posts.create',[
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
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
        $attr['category_id'] = request('category');
        $post = Post::create($attr);
        $post->tags()->attach(request('tags'));
        session()->flash('success', 'Add post success');
        return redirect()->to('post');
    }

    public function edit(Post $post){
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    public function update(PostRequest $request, Post $post){
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'Update post success');
        return redirect()->to("post/$post->slug");
    }

    public function validateRequest(){
        return request()->validate([
            'title' => 'required|min:3|max:110',
            'body' => 'required'
        ]);
    }

    public function delete(Post $post){
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'Delete post success');
        return redirect()->to('post');
    }
}
