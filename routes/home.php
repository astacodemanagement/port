<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\EmployerController;




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


// Route index
Route::get('/', [WorkerController::class, 'index']);

// Route
Route::get('/employer', [EmployerController::class, 'index']);

// Route Auth
// Route::get('/register', [RegisterController::class, 'index']);