@extends('layouts/app')

@section('title', $post->title )

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            <a href="/category/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
            &middot; {{ $post->created_at->format('d F Y') }}
            &middot;
            @foreach ($post->tags as $tag)
                <a href="/tag/{{ $tag->slug }}">{{ $tag->name }}</a> &nbsp;
            @endforeach
        </div>
        <hr>
        <p>{{ $post->body }}</p>
        <div class="d-flex">
            <a href="/post/{{ $post->slug }}/edit" class="btn btn-success btn-sm mr-2">Edit</a>
            <form action="/post/{{ $post->slug }}/delete" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </div>
@endsection