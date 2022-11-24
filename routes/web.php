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
use App\Http\Controllers\RoomManagementController;
use App\Http\Controllers\ChirpController;


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


Route::get('/', function () { return redirect('home'); });
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

//Route::resource('tasks', TasksController::class);
//Route::resource('categories', CategoriesController::class);
Route::resource('chirps', ChirpController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware('auth','verified');

Route::post('/addRoom/{building}', [BuildingManagementController::class, 'addRoom'])
    ->middleware('auth');

Route::resource('buildings', BuildingManagementController::class)
    ->middleware('auth');
    
Route::resource('rooms', RoomManagementController::class)
    ->middleware('auth');
