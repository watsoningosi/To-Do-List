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

    public function update(Request $request, Tasks $task)
    {
        $attributes =  request()->validate([
            'status' => 'required'
        ]);

        $task->update($attributes);

        return redirect()->route('taskHome')->with('success', 'Status assigned succesfully');
    }
}
