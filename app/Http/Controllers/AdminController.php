<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Tasks $task)
    {
        $task->delete();

        return redirect('admin/tasks')->with('success' ,'Task Deleted Successfully');
    }
}
