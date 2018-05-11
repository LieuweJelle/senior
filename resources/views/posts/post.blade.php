<div class="card">
  <h2><a href="/posts/{{ $post->id }}" class="black">{{ $post->title }}</a></h2>
  <h3 style="color:darkred">
  @if(count($post->tags))
      @foreach($post->tags as $tag)
      {{-- <a href="/posts/tags/{{ $tag->name }}"></a> --}}
          {{ ", ".$tag->name }}
      @endforeach
  @endif
  </h3><br />
  <p><h5 class="h5-left">{{ $post->subtitle }}</h5>
  <h5 class="h5-right">Posted by {{ $post->user->name }} on {{ $post->created_at->format('d-m-Y') }}</h5></p>
  @if (Auth::check())
      <span class="right"><a href="{{ url('/posts/edit', [ 'id' => $post->id ]) }}" class="x">w</a></span>
  @endif
  <div>{!! $post->body !!}</div>
  @if($post->cover_image) 
      <div class="fakeimg">
          <img src="/storage/cover_images/{{ $post->cover_image }}" width="760" alt="image" />
      </div>
  @endif
  <p>Vul aan... en/of</p>
</div>