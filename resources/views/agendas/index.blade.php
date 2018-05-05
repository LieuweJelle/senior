@extends('layouts.app')

@section('content')
  @include('agendas.all')
  <button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
@endsection

{{--@extends('layouts.app')

@section('content')
  @foreach($user2 as $user)
  <div class="card">
    <h2><a href="/users/{{ $user->id }}">{{ $user->email }}</a></h2>
    @if(count($user->agendas))
    <ul class="list-group">
      @foreach($user->agendas as $agenda)
        <li class="list-group-item">
          <strong>
            <a href="/users/agendas/{{ $agenda->id }}">{{ $agenda->id }}</a>
          </strong>
        </li>
      @endforeach
      </ul>    
    @endif
    <p class="blog-post-meta">on {{ $agenda->start }} to {{ $agenda->stop }}</p>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>{{ $agenda->d }}</p>
  </div>
  @endforeach
@endsection--}} 