    <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    @if(count($post->tags))
    <ul class="list-group">
      @foreach($post->tags as $tag)
        <li class="list-group-item">
          <strong>
            <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
          </strong>
        </li>
      @endforeach
      </ul>    
    @endif
    <p class="blog-post-meta">{{ $post->user->name }} on {{ $post->created_at }}</p>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>{{ $post->body }}</p>
