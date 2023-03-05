<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Tasks::where('user_id', '=', Auth::user()->id)->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function show($id, Request $request)
    {
        $task = Tasks::with('status')->where('id', '=', $id)->first();

        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Tasks $task)
    {
        return view('tasks.edit', compact('task'));
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

        return redirect('/tasks')->with('success', 'Task Updated Successfully');
    }

    public function store(Tasks $tasks)
    {
        $attributes =  request()->validate([
            'title' => 'required|max:255',
            'task_desc' => 'required|max:255',
            'user_id' => 'required|max:255',
            'task_img' => 'file'
        ]);

        if (request('task_img')) {
            $name = request('task_img')->store('/images');
            $attributes['task_img'] = "/storage/{$name}";
        } else {
            $name = null;
        }

        Tasks::create([
            'user_id' => auth()->id(),
            'title' => $attributes['title'],
            'task_desc' => $attributes['task_desc'],
            'task_img' => $name,

        ]);

        return redirect('/tasks')->with('success', 'tasks entered successfully');
    }
    public function destroy(Tasks $task)
    {
        $task->delete();

        return Redirect(route('taskHome'))->with('success', 'Task Deleted');
    }
}
