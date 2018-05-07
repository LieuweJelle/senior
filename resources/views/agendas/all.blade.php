<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Naam</td>
            <td>Taak</td>
            <td>Dag</td>
            <td>Maand</td>
            <td>Jaar</td>
            <td>van</td>
            <td>tot</td>
            <td>Toegevoegd</td>
            <td>Veranderd</td>
        </tr>
    </thead>
    <tbody>
    @if($agendas)
        @foreach ($agendas as $agenda)
            <tr>
                <td>{{ $agenda->id }}</td>
                <td>{{ $agenda->user->name }}</td>
                <td>{{ $agenda->role->name }}</td>
                <td>{{ $agenda->d }}</td>
                <td>{{ $agenda->m }}</td>
                <td>{{ $agenda->y }}</td>
                <td>{{ $agenda->start }}</td>
                <td>{{ $agenda->stop }}</td>
                <td>{{ $agenda->created_at }}</td>
                <td>{{ ($agenda->updated_at == $agenda->created_at) ? '' : $agenda->updated_at }}</td>
                <td>
                    <a class="btn btn-small btn-info" href="/agendas/{{ $agenda->id }}/edit">Edit</a>
                    <a class="btn btn-small btn-danger" href="/agendas/{{ $agenda->id }}/delete">Delete</a>
                </td>
            </tr>
        @endforeach
    
    @endif
    </tbody>
</table>