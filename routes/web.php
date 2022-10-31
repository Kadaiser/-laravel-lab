<?php

use Illuminate\Support\Facades\Route;

//Tareas
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () { return view('app'); })->name('home');

Route::get('/login', function () { return view('app');})->name('login');

//Route::get('/tareas', [TareasController::class, 'index'])->name('tasks');
//Route::get('/tareas/{id}', [TareasController::class, 'get'])->name('task');
//Route::post('/tareas', [TareasController::class, 'store'])->name('createTask');
//Route::patch('/tareas/{id}', [TareasController::class, 'update'])->name('uptadeTask');
//Route::delete('/tareas/{id}', [TareasController::class, 'delete'])->name('deleteTask');


Route::resource('tasks', TasksController::class);
Route::resource('categories', CategoriesController::class);