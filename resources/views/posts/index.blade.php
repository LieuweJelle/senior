@extends('posts.postmaster')

@section('content')
    @foreach($posts as $post)
        @include('posts.post')
    @endforeach
    <script src="{{ asset('js/functions.js') }}"></script>
@endsection