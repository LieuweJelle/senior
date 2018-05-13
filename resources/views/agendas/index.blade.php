@extends('agendas.app')

@section('content')
@foreach ($users as $user)
    <h2><a href="/users/{{ $user->id }}" class="black">{{ $user->name }}</a></h2>
    <h3 style="color:darkred">
    @if(count($user->roles))
        @foreach($user->roles as $role)
        {{-- <a href="/posts/tags/{{ $tag->name }}"></a> --}}
            {{ $roles->name." " }}
        @endforeach
    @endif
    </h3><br />
    <table><tr>
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
    </tr></table>
    @if(count($user->agendas))
        @foreach($user->agendas as $agenda)
        <div class="subcard">
            <table><tr>
            <td>{{ $agenda->id }}</td>
            <td>{{ $agenda->user->name }}</td>
            <td>{{ $agenda->role->name }}</td>
            <td>{{ $agenda->d->format('d') }}</td>
            <td>{{ $agenda->m->format('m') }}</td>
            <td>{{ $agenda->y }}</td>
            <td>{{ $agenda->start }}</td>
            <td>{{ $agenda->stop }}</td>
            <td>{{ $agenda->created_at->format('d-m-Y H:i:s') }}</td>
            <td>{{ ($agenda->updated_at == $agenda->created_at) ? '' : $agenda->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr></table>
        </div>
        @endforeach
    @endif
@endforeach
@endsection