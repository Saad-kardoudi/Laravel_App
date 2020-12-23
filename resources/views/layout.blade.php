<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <title>Document</title>
</head>
<body>
    @if (session()->has('status'))
        <h3>{{session()->get('status')}}</h3>
    @endif
    <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">            
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">Create Post</a></li>
        </ul>
    </nav>
    </header>
    <div class="container">
        @yield('Content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>