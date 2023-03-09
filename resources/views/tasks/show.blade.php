<x-master>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">
                        {{ $task->title }} </h4>
                    <div class="card-body">
                        <center class="mt-3 mb-3">
                            @if ($task->task_img == null)
                                <img src="{{ $task->taskDefault }}" alt="">
                            @else
                                <img src="{{ $task->task_img }}" alt="">
                            @endif
                        </center>
                        <p class="text-muted">
                            {{ $task->task_desc }}
                        </p>
                        <span style="color: greenyellow"
                            class="pull-right">{{ $task->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="card-footer row">
                        <a href="{{ route('UsrEditTask', $task->title) }}"
                            class="btn btn-sm btn-primary mb-1 col-md-3">edit</a>
                        <br>
                        <form action="{{ route('UsrDelTask', $task->title) }}" class="col-md-3" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" name="submit" type="submit">Delete</button>
                        </form>
                        <center class="col-md-3">

                            <label for="" class="btn btn-sm btn-warning"> {{ $task->status }}</label>

                        </center>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="">

                    <form action="{{ route('upState', $task->title) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <select class="form-control" name="status" id="">
                                <option style="color: green;font-weight:900;" selected value="{{ $task->status }}">
                                    {{ $task->status }}</option>
                                <option value="pending">Pending</option>
                                <option value="active">Active</option>
                                <option value="review">Review</option>
                                <option value="close"> Close</option>
                            </select>
                        </div>
                        <button name="submit" class="btn btn-success btn-sm mt-1" type="submit">Update
                            Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
