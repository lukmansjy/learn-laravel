<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Blog' }}</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
</head>
<body>
    @include('layouts/navigation')
    
    <div class="py-4">
        @if (session('success'))
            <div class="container">
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>