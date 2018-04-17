@foreach ($users as $user)
	<h2><a href="users/{{$user->id}}/edit">{{$user->name}}</a></h2>
@endforeach