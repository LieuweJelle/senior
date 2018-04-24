@extends('posts.postmaster')

@section('content')
  @foreach($posts as $post)
  <div class="card">
    @include('posts.post')
  </div>
  @endforeach
@endsection