<x-adlay>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-2">New Team</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="col-md-2" for="">Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control col-md-8">
                    @error('name')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="col-md-2" for="">About</label>
                    <textarea name="about" id="" cols="30" rows="4" class="form-control col-md-8">{{ old('about') }}</textarea>
                    @error('about')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="col-md-2" for="">Owner</label>
                    <input type="number" value="{{ old('owner_id') }}" name="owner_id" class="form-control col-md-8">
                    @error('owner_id')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add team</button>
            </form>
        </div>
    </div>
    </div>
</x-adlay>
