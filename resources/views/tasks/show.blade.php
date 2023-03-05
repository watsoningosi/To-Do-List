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
                    <div class="card-footer">
                        <a href="{{ route('UsrEditTask', $task->title) }}" class="btn btn-sm btn-primary mb-1">edit</a>
                        <br>
                        <form action="{{ route('UsrDelTask', $task->title) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" name="submit" type="submit">Delete</button>
                        </form>
                        <h3 class="text-muted font-weight-bold">

                            {{ $task->status->status ?? ' Please Assign status !' }}


                        </h3>
                        <div class="col-md-6">

                            <form action="/tasker/{task}/status" method="post">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="status" id="">
                                        <option value="pending">Pending</option>
                                        <option value="active">Active</option>
                                        <option value="review">Review</option>
                                        <option value="close"> Close</option>
                                    </select>
                                </div>
                                <input type="hidden" name="task_id" id="" value="{{ $task->id }}"
                                    class="form-control">
                                <button name="submit" class="btn btn-success btn-sm mt-1" type="submit">Assign
                                    Task</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
