@extends('layouts/app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Home Page</h1>
        <p>Halo {{ $name }}</p>
    </div>
@endsection