<x-adlay>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header">Bordered table</h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> #</th>
                                            <th> Username</th>
                                            <th> Email</th>
                                            <th> Previlage</th>
                                            <th> Created at </th>
                                            <th> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $users)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>
                                                    @if ($users->admin == 1)
                                                        {{ 'Admin' }}
                                                    @else
                                                        {{ 'Regular user' }}
                                                    @endif
                                                </td>
                                                <td>{{ $users->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('editUsr',$users->name) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    &nbsp;/
                                                    &nbsp;
                                                    <form action="{{ route('delUser', $users->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button name="submit" type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>

                                                    </form>

                                                </td>
                                            </tr>

                                        @empty
                                            no tasks available
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
