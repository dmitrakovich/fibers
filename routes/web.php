<?php

use App\Http\Controllers\AsyncController;
use Illuminate\Support\Facades\Route;

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
Route::view('/', 'welcome');

Route::get('coroutines', [AsyncController::class, 'coroutines']);
Route::get('fibers', [AsyncController::class, 'fibers']);
