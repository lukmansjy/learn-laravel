@extends('layouts/app')

@section('title', $post->title )

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            {{ $post->category->name }} &middot; {{ $post->created_at->format('d F Y') }}
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