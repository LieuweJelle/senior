@extends('layouts.app')

@section('content')
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

<div class="form-group">
<a href="{{ url('/users/') }}">Terug</button>
</div>
@endsection
