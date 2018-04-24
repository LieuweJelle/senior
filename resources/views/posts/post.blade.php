    <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->user->name }} on {{ $post->created_at }}</p>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>{{ $post->body }}</p>
