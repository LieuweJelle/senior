<div class="card">
    @if (Auth::check())
        <button type="button" class="button" id="button5" onclick="javascript:location.href='{{ url('/logout') }}'">uitloggen</button><br />
        <div id='fieldspace'></div>
    @else
        <button type="button" class="button" id="button5" onclick="javascript:location.href='{{ url('/login') }}'">inloggen</button><br />
        <div id='fieldspace'></div>
    @endif
    <form class="example" action="/posts/search" method="post">
        <input type="text" placeholder="Search.." name="search" id="search" class="search">
        <div id='fieldspace'></div>
        <button type="button" class="button" id="button4">zoeken in blog</button>
    </form>
    <div id='fieldspace'></div><div id='fieldspace'></div>
    @if (Auth::check())
        <button type="button" class="button" id="button1" onclick="javascript:location.href='{{ url('/posts/create') }}'">upload nieuw artikel</button><br />
        <div id='fieldspace'></div>
    @endif
</div>
  
<div class="card">
    <h2>About Me</h2>
    <img class="portrait" src="{{ asset('img/lieuwe.jpg') }}" width="77" alt="image" />
    <div class="fakeimgportrait"></div>
    <table class="table"><tr><td>Laravel</td></tr><tr><td>PHP</td></tr><tr><td>JS HTML CSS</td></tr></table><br />
    <p class="after">Lieuwe Jelle hierzoot... Noise, a way of life.</p>
</div>

<div class="card">
  <h3>Tags</h3>
  <ul class="list-unstyled">
      @foreach($tags as $tag)
          <li>
              <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
          </li>
      @endforeach
  </ul>
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
    <h3>Logos</h3>
    <div class="fakeimgsmall"><img src="/storage/cover_images/atg-logo.jpg" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/abr-logo.jpg" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/fa-logo.jpg" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/autopsy-logo.png" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/bt-logo.png" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/as-logo.png" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/images.jpeg" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/SYLlogo.png" width="170" alt="image" /></div><br />
    <div class="fakeimgsmall"><img src="/storage/cover_images/neurosis-logo.png" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/arckanum-logo.jpg" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/slayer-logo.png" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/ent-logo.jpg" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/Melvinslogo.png" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/grave-logo.png" width="170" alt="image" /></div>
    <div class="fakeimgsmall"><img src="/storage/cover_images/Rammstein-logo.png" width="170" alt="image" /></div>
</div>

<div class="card">
  <h3>Tags</h3>
  <ul class="list-unstyled">
    @foreach($tags as $tag)
      <li>
        <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
      </li>
    @endforeach
  </ul>
</div>

<div class="card">
  <h3>Popular Post</h3>
  <div class="fakeimg"><img src="/storage/cover_images/slayer-xtra.jpg" width="170" alt="image" /></div><br />
  <div class="fakeimg"><img src="/storage/cover_images/atthegates-xtra.jpg" width="170" alt="image" /></div><br />
  <div class="fakeimg"><img src="/storage/cover_images/Fleshgod-Apocalpse-xtra.jpg" width="170" alt="image" /></div>
</div>

<div class="card">
  <h3>Follow Me</h3>
  <p>Some text..</p>
</div>