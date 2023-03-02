<x-adlay>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Task</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('upTask', $task->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="" class="col-md-3">Title</label>
                                <input type="text" value="{{ $task->title }}" name="title" id=""
                                    class="form-control col-md-9">
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-3">Task Description</label>
                                <textarea name="task_desc" class="form-control col-md-9" id="" cols="30" rows="4">{{ $task->task_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3">Image</label>
                                <input type="file" name="task_img" id="" class="form-control">
                                @if ($task->task_img == '')
                                    <p class="mt-1"> No images posted</p>
                                @else
                                    <img src="{{ $task->task_img }}" class="mt-1" width="100px" height="100px"
                                        alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <button name="submit" class="btn btn-primary" type="submit">Edit Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adlay>
