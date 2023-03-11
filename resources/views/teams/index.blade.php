<x-adlay>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header">Teams <span class="pull-right"><a href="{{ route('teams.create') }}" class="btn btn-sm btn-primary">Add Team</a></span></h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> #</th>
                                            <th> Name</th>
                                            <th> About</th>
                                            <th> Owner</th>
                                            <th> Created</th>
                                            <th> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($teams as $team)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->about }}</td>
                                                <td>{{ $team->user->name }} </td>
                                                <td>{{ $team->created_at->diffForHumans() }}</td>

                                                <td>

                                                    <form action="{{ route('teams.destroy', $team->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button name="submit" type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>

                                                    </form>

                                                </td>
                                            </tr>


                                        @empty
                                            no teams available
                                        @endforelse



                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adlay>