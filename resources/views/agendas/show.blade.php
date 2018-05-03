@extends('layouts.app')

@section('content')
<div class="container">
  @foreach($user->agendas as $agenda)
    <p>
    {{ $agenda->y }}
    </p>
  @endforeach
</div>
@endsection