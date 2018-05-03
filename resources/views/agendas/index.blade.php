@extends('layouts.app')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>UserID</td>
            <td>Day</td>
            <td>Month</td>
            <td>Year</td>
            <td>van</td>
            <td>tot</td>
            <td>Created</td>
            <td>Updated</td>
        </tr>
    </thead>
    <tbody>
    @if($agendas)
    @foreach ($agendas as $agenda)
        <tr>
            <td>{{ $agenda->id }}</td>
            <td>{{ $agenda->user_id }}</td>
            <td>{{ $agenda->d }}</td>
            <td>{{ $agenda->m }}</td>
            <td>{{ $agenda->y }}</td>
            <td>{{ $agenda->start }}</td>
            <td>{{ $agenda->stop }}</td>
            <td>{{ $agenda->created_at }}</td>
            <td>{{ $agenda->updated_at }}</td>

            <td>

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="agendas/{{ $agenda->id }}">Show</a>
    
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="agendas/{{ $agenda->id }}/edit">Edit</a>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <a class="btn btn-small btn-danger" href="agendas/{{ $agenda->id }}/delete">Delete</a>

            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>

<button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
@endsection

{{--@extends('layouts.app')

@section('content')
  @foreach($user2 as $user)
  <div class="card">
    <h2><a href="/users/{{ $user->id }}">{{ $user->email }}</a></h2>
    @if(count($user->agendas))
    <ul class="list-group">
      @foreach($user->agendas as $agenda)
        <li class="list-group-item">
          <strong>
            <a href="/users/agendas/{{ $agenda->id }}">{{ $agenda->id }}</a>
          </strong>
        </li>
      @endforeach
      </ul>    
    @endif
    <p class="blog-post-meta">on {{ $agenda->start }} to {{ $agenda->stop }}</p>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>{{ $agenda->d }}</p>
  </div>
  @endforeach
@endsection--}} 