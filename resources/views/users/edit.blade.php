<form method="POST" action="../{{ $user->id }}">
	@csrf
	{{ method_field('PATCH') }}
    <div class="form-group">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" value="{{ $user->name }}" />
    </div>
    <div class="form-group">
		<label for="role">Role:</label>
		<select class="form-control" name="role_id">
			<option label=" "></option>
			@foreach($roles as $role)
				<option value="{{$role->id}}" {{($user->role_id == $role->id) ? "selected" : ""}}>{{$role->name}}</option>
			@endforeach
		</select>
    </div>
	<button type="submit">Opslaan</button>
</form>