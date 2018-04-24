@extends('layouts.master')

@section('content')
  <div class="col-sm-8 blog-main">
    <h1>{{ $post->title }}</h1>
    {{ $post->body }} 
    <hr />
    <div class="comments">
      <ul class="list-group">
      @foreach($post->comments as $comment)
        <li class="list-group-item">
          {{ $comment->body }}
        </li>
      @endforeach
    </div>
    <hr />
    <div class="card">
      <div class="card-block">
        <form>
          <div class="form-group">
            <textarea name="body" placeholder="Comment" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
          </div>
        </form>
      </div>
    </div>
  </div>  
@endsection