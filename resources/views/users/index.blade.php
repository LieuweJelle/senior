@extends('layouts.app')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Gebruikersnaam</td>
            <td>Email</td>
            <td>Voornaam</td>
            <td>Achternaam</td>
            <td>Telefoon</td>
            <td>Straat</td>
            <td>Nr</td>
            <td>Postcode</td>
            <td>Woonplaats</td>
            <td>Introductie</td>
            <td>Functies</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->telephone }}</td>
            <td>{{ $user->street }}</td>
            <td>{{ $user->streetnumber }}</td>
            <td>{{ $user->zipcode }}</td>
            <td>{{ $user->place }}</td>
            <td>{{ $user->intro }}</td>
            <td><table><tbody><tr>
                @foreach ($user->roles as $role)
                    <td>{{ $role->name }}</td>
                @endforeach
            </tr></tbody></table></td>
            <td>
                <a class="btn btn-small btn-success" href="/users/{{ $user->id }}">Show this User</a>
                <a class="btn btn-small btn-info" href="/users/{{ $user->id }}/edit">Edit this User</a>
                <a class="btn btn-small btn-danger" href="/users/{{ $user->id }}/delete">Delete this User</a>
            </td>
        </tr>
    @endforeach
    </tr></table></td>
    </tbody>
</table>
 
<div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
      <button type="button" class="btn btn-primary" onclick="location.href='{{ route('users.create') }}'">
          {{ __('Toevoegen Senioren en Vrijwilligers') }}
      </button>
      <a href="{{ action('UserController@indexall') }}" class="btn btn-outline-primary">
          {{ __('Alles') }}
      </a>
      <a href="/"  class="btn btn-outline-primary">
          {{ __('Terug') }}
      </a>
  </div>
</div>
@endsection
