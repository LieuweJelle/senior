@extends('layouts.app')

@section('content')
<!-- <form method="POST" action="{{ route('users.update', [ 'id' => $user->id ]) }}"> -->
<form method="POST" action="../{{ $user->id }}">
	@csrf
	@method('PATCH')
    <div class="form-group">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" value="{{ $user->name }}" />
    </div>
    <div class="form-group">
		<label for="role">Role:</label>
		<select class="form-control" name="role_id" multiple>
			@foreach($roles as $role)
				<option value="{{$role->id}}" {{($user->role_id == $role->id) ? "selected" : ""}}>{{$role->name}}</option>
			@endforeach
		</select>
    </div>
	<button type="submit">Opslaan</button>
  <!-- welke? -->
  <a href="{{ action('UserController@index') }}">Terug</a>
  <!-- of
  <a href="{{ url('/users/') }}">Terug</a>
  <a href="{{ route('users.index') }}">Terug</a>
       ze werken alle drie. wanneer zou ik welke moeten gebruiken?
  -->
</form>
@endsection
