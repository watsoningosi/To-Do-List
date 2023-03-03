<x-master>
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Edit task</h4>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-2">
                            <label for="" class="col-md-3">Title</label>
                            <input type="text" value="{{ $task->title }}" name="title" id=""
                                class="form-control col-md-9">
                            @error('title')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="" class="col-md-3">Task Description</label>
                            <textarea name="task_desc" class="form-control col-md-9" id="" cols="30" rows="4">{{ $task->task_desc }}</textarea>
                            @error('task_desc')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="col-md-3">Image</label>
                            <input type="file" name="task_img" id="" class="form-control">

                            @error('task_img')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                            @if ($task->task_img == '')
                                <p class="mt-1"> No images posted</p>
                            @else
                                <img src="{{ $task->task_img }}" class="mt-1" width="100px" height="100px"
                                    alt="">
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <button name="submit" class="btn btn-primary" type="submit">Edit Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
