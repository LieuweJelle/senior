@extends('posts.postmaster')

@section('content')
<div class="card">
  <h2><a href="/posts/{{ $post->id }}" class="black">{{ $post->title }}</a></h2>
  <h3 style="color:darkred">
  @if(count($post->tags))
      @foreach($post->tags as $tag)
      {{-- <a href="/posts/tags/{{ $tag->name }}"></a> --}}
          {{ ", ".$tag->name }}
      @endforeach
  @endif
  </h3>

  @if($post->subtitle)
      <h5>{{ $post->created_at->format('d-m-Y H:i:s') }}</h5>
  @else
      <h5>{{ $post->subtitle }} , {{ $post->created_at->format('d-m-Y H:i:s') }}</h5>
  @endif

  {{-- @if(isBlogger()) {
      <span class="right"><a href="{{ updateArticle.php id=> $post->id }}" class="x">w</a></span>
  @endif --}}
  <div>{!!  $post->body !!}</div>
  @if($post->cover_image) 
      <div class="fakeimg">
          <img src="/storage/cover_images/{{ $post->cover_image }}" width="760" alt="image" />
      </div>
  @endif
  <p>Vul aan... en/of</p>
  
  @foreach($post->comments as $comment)
      <div class="subcard">
          <h3 style="color:darkred">{{ $comment->title }}</h3><h5>{{ $comment->created_at->format('d-m-Y H:i:s') }}</h5>
          <div>{{ $comment->body }}</div><span class="right"><a href="delete.php?id='.$blogReaction['id'].'" class="x">x</a></span>
      </div>
  @endforeach
  @if(!$post->disabled)
<!--       <button type="button" id="button10" class="button button10">reageer</button><br />
if allowed -->
      <div id="react" class="react">
          <form method="post" action="/posts/{{ $post->id }}/comments" name="form1" class="form1">
              @csrf
              <span class="namefield">Titel Reactie</span>
              <input type="text" id="txt" size="43" maxlength="50" name="title" value="" autocomplete="off" /><br />
              <div id="fieldspace"></div>
              <span class="namefield">Text Reactie:</span><br />
              <textarea class="form-control" rows="3" cols="75" id="comment" name="body"></textarea><br />
              <button type="submit" name="submit" id="button5">Add Comment</button>
          </form>
          @include('layouts.error')
      </div>
<!-- else -->

<!-- endif -->
  @endif
</div>
@endsection