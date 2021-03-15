<?php

use App\Http\Controllers\ThemeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/approve', [App\Http\Controllers\HomeController::class, 'approve'])->name('approve')->middleware('admin');

Route::get('/theme/create', [ThemeController::class, 'show'])->name('theme.show');
Route::post('/theme/create', [ThemeController::class, 'create'])->name('theme.create');
Route::get('/theme/{id}', [ThemeController::class, 'present'])->name('theme.present');
Route::get('/theme/{id}/edit', [ThemeController::class, 'edit'])->name('theme.edit');
Route::post('/theme/{id}/edit', [ThemeController::class, 'update'])->name('theme.update');
Route::get('/theme/{id}/delete', [ThemeController::class, 'delete'])->name('theme.delete');
Route::get('/theme/{id}/status', [ThemeController::class, 'status'])->name('theme.status')->middleware('admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
