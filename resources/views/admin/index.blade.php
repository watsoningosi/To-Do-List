<x-adlay>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

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
                                        <th>Actions</th>
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
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning mb-1">Edit</a>
                                                &nbsp;/&nbsp;

                                                <form action="{{ route('delTask', $task) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button name="submit" class="btn btn-sm btn-danger" type="submit">
                                                        Delete</button>
                                                </form>

                                            </td>
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
</x-adlay>
