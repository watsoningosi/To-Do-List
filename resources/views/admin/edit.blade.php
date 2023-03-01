<x-adlay>


    <div class="card">
        <div class="card-header">
            <h5 class="mb-2"> Edit User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('editUser', $user->name) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label class="col-md-2" for="">Username</label>
                    <input type="name" value="{{ $user->name }}" name="name" class="form-control col-md-6">
                    @error('name')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="col-md-2" for="">Email address</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control col-md-6">
                    @error('email')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label class="" for="">Previlage</label>
                    <div class="col-md-6">
                        <!-- col-md-6 Begin -->

                        <select name="admin" class="form-control selectpicker" @error('admin') alert-danger @enderror
                            value="{{ old('admin') }}"required autocomplete="admin" data-size="5">
                            <!-- form-control Begin -->

                            <option selected>
                                @if ($user->admin == 1)
                                    {{ 'Admin' }}
                                @else
                                    {{ 'Regular user' }}
                                @endif
                            </option>
                            <option value="0"> No </option>
                            <option value="1"> Yes</option>

                        </select><!-- form-control Finish -->

                    </div><!-- col-md-6 Finish -->
                    <br>
                    @error('admin')
                        <strong class="toast">
                            <p class="help alert-danger">{{ $errors->first('admin') }}</p>
                        </strong>
                    @enderror

                </div>

                <div class="form-group mb-2">
                    <label class="col-md-2" for="">Password</label>
                    <input type="password" name="password" value="{{ $user->password }}" class="form-control col-md-6">
                    @error('password')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-6">
                    <label for="" class="col-md-2">Password
                        Confirmation</label>

                    <input type="password" name="password_confirmation" class="form-control col-md-6" id="">

                    @error('password_confirmation')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                <button type="submit" name="submit" class="btn btn-primary">Edit user</button>
            </form>
        </div>
    </div>
    </div>
</x-adlay>
