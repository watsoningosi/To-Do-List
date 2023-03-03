<x-master>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h5>Get tasks</h5>
                            <a href="{{ route('taskHome') }}" class="btn btn-primary pull-right p-1">create task</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tasks as  $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->task_desc }}</td>
                                                <td>{{ $task->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ route('UsrEditTask', $task->title) }}"
                                                        class="btn btn-sm btn-primary mb-1">edit</a>
                                                    &nbsp;/&nbsp;
                                                    <form action="{{ route('UsrDelTask', $task->title) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" name="submit"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>

                                        @empty

                                            <p>no tasks postes</p>
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

</x-master>
