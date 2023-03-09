<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with('user')->get();

        return view('admin.sessions', compact('sessions'));
    }
}
