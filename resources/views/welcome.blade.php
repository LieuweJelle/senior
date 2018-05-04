@extends('layouts.app')

@section('content')
<div class="container">
  <ul>
    @foreach($tasks as $task)
      <li><a href="{{ url($task) }}">{{ $task }}</a></li>
    @endforeach
  </ul>
</div>
@endsection