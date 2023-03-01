<x-adlay>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header">Bordered table</h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                User
                                            </th>
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Created at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->user->name }}</td>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->task_desc }}</td>
                                                <td>{{ $task->created_at->diffForHumans() }}</td>
                                            </tr>

                                        @empty
                                            no tasks available
                                        @endforelse


                                    </tbody>
                                </table>
                                {!! $tasks->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adlay>
