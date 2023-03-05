<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Models\Tasks;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatusController extends Controller
{

    public function store(Request $request, status $status)
    {
      $attributes =  request()->validate([
            'task_id' => 'required',
            'status' => 'required'
        ]);

        Status::updateOrCreate([
        'task_id' => $attributes['task_id'],
        'status' => $attributes['status'],
        ]);

        return redirect()->route('taskHome')->with('success', 'Status assigned succesfully');
    }

}
