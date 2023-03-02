<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller


{    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
   
    public function index()
    {
            $tasks = Tasks::with('user')->latest()->paginate(10);
            return view('admin.index',compact('tasks'));
       
    }

    public function edit(Tasks $task)
    {
        return view('admin.edittask',compact('task'));
    }

    public function update(Request $request, Tasks $task)
    {
        $attributes =  request()->validate([
            'title' => 'required|max:255',
            'task_desc' => 'required|max:255',
            'task_img' => 'file'
        ]);

        if (request('task_img')) {
            $name = request('task_img')->store('/images');
            $attributes['task_img'] = "/storage/{$name}";
        }

        $task->update($attributes);

        return redirect('/admin/tasks')->with('success' ,'Task Updated Successfully');

    }

    public function destroy(Tasks $task)
    {
        $task->delete();

        return redirect('admin/tasks')->with('success' ,'Task Deleted Successfully');
    }
}
