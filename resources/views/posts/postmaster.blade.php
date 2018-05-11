<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="blog">
    <div class="header">
        <h2 class="header1">
        @if(Auth::check())
            {{ Auth::user()->firstname}} {{ Auth::user()->lastname}}
        @else
            Groningen, Korreweg-wijk
        @endif
        </h2>  
    </div>
    <div class="row">
      <div class="leftcolumn">
        @yield('content')
      </div>
      <div class="rightcolumn">
        @include('posts.sidebar')
      </div>
    </div>
    @include('posts.footer')
  </body>
</html>  