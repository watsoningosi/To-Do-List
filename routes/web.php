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

    Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('taskHome');

    Route::get('/tasker/{task:title}', [App\Http\Controllers\TasksController::class, 'show'])->name('viewTask');

    Route::get('/tasks/create', [App\Http\Controllers\TasksController::class, 'create'])->name('addTask');

    Route::post('/tasks/create', [App\Http\Controllers\TasksController::class, 'store'])->name('saveTask');

    Route::get('/tasks/{task:title}', [App\Http\Controllers\TasksController::class, 'edit'])->name('UsrEditTask');

    Route::patch('/tasks/{task:title}', [App\Http\Controllers\TasksController::class, 'update'])->name('UsrUpTask');

    Route::delete('/tasks/{task:title}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('UsrDelTask');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/tasks', [App\Http\Controllers\AdminController::class, 'index'])->name('adminHome');

    Route::delete('/admin/tasks/{task}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('delTask');

    Route::get('/admin/tasks/edit/{task}', [App\Http\Controllers\AdminController::class, 'edit'])->name('getTask');

    Route::patch('/admin/tasks/edit/{task}', [App\Http\Controllers\AdminController::class, 'update'])->name('upTask');

    Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'index'])->name('adminUsers');

    Route::delete('/admin/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('delUser');

    Route::get('/admin/users/edit/{user:name}', [App\Http\Controllers\UsersController::class, 'edit'])->name('editUsr');

    Route::patch('/admin/users/edit/{user:name}', [App\Http\Controllers\UsersController::class, 'update'])->name('editUser');
});
