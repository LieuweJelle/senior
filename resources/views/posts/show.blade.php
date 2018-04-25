@extends('posts.postmaster')

@section('content')
  <div class="col-sm-8 blog-main">
    <h1>{{ $post->title }}</h1>
    {{ $post->body }} 
    <hr />
    <div class="comments">
      <ul class="list-group">
      @foreach($post->comments as $comment)
        <li class="list-group-item">
          <strong>
            {{ $comment->created_at }}:&nbsp;
          </strong>
          {{ $comment->body }}
        </li>
      @endforeach
      </ul><!---->
    </div>
    <hr />
    <div class="card">
      <div class="card-block">
        <form method="POST" action="/posts/{{ $post->id }}">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <input type="text" name="title" id="title" placeholder="Titel" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <textarea name="body" id="body" placeholder="Comment" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
          </div>
        </form>
        @include('layouts.error')
      </div>
    </div>
  </div>  
@endsection