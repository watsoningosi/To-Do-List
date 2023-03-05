<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.user', (compact('users')));
    }

    public function edit(User $user)
    {
        return view('admin.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
      $attributes =  request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|confirmed',
        'admin' => 'required'
        ]);

        $user->update($attributes);

        return redirect(route('editUser',$user->name))
                       ->with('success', 'User has been Updated');
    }

    public function destroy(User $user)
    {
        $user ->delete();

        return redirect('/admin/users')->with('success','user deleted successfully');
    }
}
