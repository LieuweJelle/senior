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
            <td>Functies en Tijdstippen</td>
            <td>Bewerkingen</td>
        </tr>
    </thead><!-- -->
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
                     <td><table><tbody><tr>
                        @foreach ($role->agendas as $agenda)
                            <?php
                            $d = (strlen($agenda->d)==1) ? '0'.$agenda->d : $agenda->d;
                            $m = (strlen($agenda->m)==1) ? '0'.$agenda->m : $agenda->m;
                            ?>
                            @if($agenda->user_id == $user->id)
                                <td>{{ $d.'-'.$m.'-'.$agenda->y }}<br />
                                {{ $agenda->start.' '.$agenda->stop }}</td>
                            @endif
                        @endforeach
                     </tr></tbody></table></td>
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
      <a href="{{ action('UserController@index') }}" class="btn btn-outline-primary">
          {{ __('Terug') }}
      </a>
  </div>
</div>
@endsection
