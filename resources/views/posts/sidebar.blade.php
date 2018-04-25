  <div class="card">
    <h2>About Me</h2>
    <div class="fakeimg" style="height:100px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
  </div>
  <div class="card">
    <h3>Archives</h3>
    <ul class="list-unstyled">
      @foreach($archives as $archive)
        <li>
          <a href="/posts?month={{ $archive['month'] }}&year={{ $archive['year'] }}">{{ $archive['month'] .' '. $archive['year'] }}</a>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="card">
    <h3>Popular Post</h3>
    <div class="fakeimg">Image</div><br />
    <div class="fakeimg">Image</div><br />
    <div class="fakeimg">Image</div>
  </div>
  <div class="card">
    <h3>Follow Me</h3>
    <p>Some text..</p>
  </div>

