@extends('layouts.app')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Body</td>
            <td>Created</td>
            <td>Updated</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->body }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->updated_at }}</td>

            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="tasks/{{ $task->id }}">Show this Task</a>
    
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="tasks/{{ $task->id }}/edit">Edit this Task</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>            
@endsection
