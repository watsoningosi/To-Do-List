<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/tasks/home', [App\Http\Controllers\TasksController::class, 'index'])->name('taskHome');

    Route::post('/tasks/home', [App\Http\Controllers\TasksController::class, 'store'])->name('saveTask');

    Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'show'])->name('ShowTask');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('adminHome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
