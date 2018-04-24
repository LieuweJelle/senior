@extends('layouts.app')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Telephone</td>
            <td>Street</td>
            <td>S-nr</td>
            <td>Zipcode</td>
            <td>Place</td>
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

            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="users/{{ $user->id }}">Show this User</a>
    
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="users/{{ $user->id }}/edit">Edit this User</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>            
@endsection
