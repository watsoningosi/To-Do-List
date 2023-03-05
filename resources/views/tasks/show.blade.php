<x-master>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">
                    {{ $task->title }}                </h4>
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
                      <p class="text-muted">
                
                        {{ $task->status->status ?? ' Please Assign status' }}
                            
                        
                    </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
