<?php

use Illuminate\Support\Facades\Route;

//Tareas
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BuildingManagementController;

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


Route::get('/', function () { return view('welcome'); });


Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index']);

//Route::resource('tasks', TasksController::class);
//Route::resource('categories', CategoriesController::class);
Route::post('/addRoom/{building}', [BuildingManagementController::class, 'addRoom']);
Route::resource('buildings', BuildingManagementController::class);
