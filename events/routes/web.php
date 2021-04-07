<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(function() {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('user.home')->middleware('verified');
    
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard')->middleware(['verified', 'admin']);
    Route::get('/verification/notice', [App\Http\Controllers\UserController::class, 'notice'])->name('verification.notice');
    Route::get('/verification/resend/{id}', [App\Http\Controllers\UserController::class, 'resend'])->name('verification.resend');
});
Route::get('/verification/{id}/{validation_token_hash}', [App\Http\Controllers\UserController::class, 'validateUserEmail'])->name('verification.verify');
