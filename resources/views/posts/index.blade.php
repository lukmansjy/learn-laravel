@extends('layouts/app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            @isset($category)
                <h4>Posts Category {{ $category->name }}</h4>
            @endisset
            @isset($tag)
                <h4>Posts Tag {{ $tag->name }}</h4>
            @endisset
            @if (!isset($category) && !isset($tag))
                <h4>All Post</h4>
            @endif
        </div>
        <div>
            <a href="/post/create" class="btn btn-primary">New Post</a>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <div>
                        {{ Str::limit($post->body, 100, '.') }}
                    </div>
                    <a href="/post/{{ $post->slug }}">Read More</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- Published on {{ $post->created_at->format("d F Y") }} --}}
                    <div>
                        Published on {{ $post->created_at->diffForHumans() }}
                    </div>
                    <div>
                        <a href="post/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection