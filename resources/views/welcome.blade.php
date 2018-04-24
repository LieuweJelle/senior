@extends('layouts.app')

@section('content')
<div class="container">
  <ul>
    @foreach($tasks as $task)
      <li>{{ $task }}</li>
    @endforeach
  </ul>
</div>
@endsection