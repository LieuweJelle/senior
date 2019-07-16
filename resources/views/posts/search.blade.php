@extends('posts.postmaster')

@section('content')
    @foreach($query as $row)
        {{ $row->title }}
    @endforeach
    <script src="{{ asset('js/functions.js') }}"></script>
@endsection
