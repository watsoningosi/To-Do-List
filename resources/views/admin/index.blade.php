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
                                        @forelse ($tasks as $tasks )

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tasks->user->name}}</td>
                                            <td>{{ $tasks->title }}</td>
                                            <td>{{ $tasks->task_desc }}</td>
                                            <td>{{ $tasks->created_at->diffForHumans() }}</td>
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
