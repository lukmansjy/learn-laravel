@extends('layouts/app')

@section('title', $post->title )

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <div>
            <a href="/post/{{ $post->slug }}/edit" class="btn btn-success">Edit</a>
        </div>
    </div>
@endsection