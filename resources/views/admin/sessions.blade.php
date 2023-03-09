<x-adlay>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header">Activity</h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> #</th>
                                            <th> Username</th>
                                            <th> Ip Address</th>
                                            <th> Browser</th>
                                            <th> Payload</th>
                                            <th> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sessions as $session)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $session->user->name ?? 'Default User' }}</td>
                                                <td>{{ $session->ip_address }}</td>
                                                <td>{{ $session->user_agent }} </td>
                                                <td>{{ $session->payload }}</td>

                                                <td>

                                                    <form action="" method="post">
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
