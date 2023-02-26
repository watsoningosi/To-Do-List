<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tasks.index');
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
        }

         Tasks::create([
            'user_id' => auth()->id(),
            'title' => $attributes['title'],
            'task_desc' => $attributes['task_desc'],
            'task_img' => $name,

         ]);

        return redirect('/tasks')->with('success' ,'tasks entered successfully');
    }
    public function show()
    {
        return view('tasks.show',[
            'tasks' => Tasks::where('user_id','=',Auth::user()->id)->get()
        ]);
    }
}
