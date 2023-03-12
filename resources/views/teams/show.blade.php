<x-adlay>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>Team ID</th>
                <th>Number of Members</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($team as $row)
            <tr>
                <td>{{ $row->team_id }}</td>
                <td>{{ $row->members }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</x-adlay>