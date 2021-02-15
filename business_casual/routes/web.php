<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('/info', [App\Http\Controllers\LoginController::class, 'info'])->name('info');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'validation']);