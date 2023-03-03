<x-master>
    <div class="container">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">

                <div class="card-header">
                    <h5>Add task</h5>
                    <a href="{{ route('ShowTask') }}" class="btn btn-warning">view tasks</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('saveTask') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="" class="form-control">
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="task_desc" width="100%" id="" cols="50" rows="4">{{ old('task_desc') }}</textarea>
                                @error('task_desc')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" value="{{ old('task_img') }}" name="task_img" class="form-control" id="">
                                @error('task_img')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                               
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-danger">Cancel</button>
                                <input type="submit" value="Add a Task" name="submit" class="btn btn-success">
                            </div>
                            
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>
</x-master>
