<?php

use App\Http\Controllers\CommentController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'front_page'])->name('index');

Auth::routes();

Route::prefix('home')->middleware('auth')->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/approve', [App\Http\Controllers\HomeController::class, 'approve'])->name('approve')->middleware('admin');
});

Route::prefix('theme')->middleware('auth')->group(function() {
    Route::get('/create', [ThemeController::class, 'show'])->name('theme.show');
    Route::post('/create', [ThemeController::class, 'create'])->name('theme.create');
    Route::get('/{id}/edit', [ThemeController::class, 'edit'])->name('theme.edit');
    Route::post('/{id}/edit', [ThemeController::class, 'update'])->name('theme.update');
    Route::get('/{id}/delete', [ThemeController::class, 'delete'])->name('theme.delete');
    Route::get('/{id}/status', [ThemeController::class, 'status'])->name('theme.status')->middleware('admin');
});

Route::get('/theme/{id}', [ThemeController::class, 'present'])->name('theme.present');

Route::post('/comment/{theme_id}/create', [CommentController::class, 'create'])->name('comment.create')->middleware('auth');