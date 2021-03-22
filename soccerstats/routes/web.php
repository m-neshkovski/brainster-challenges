<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
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

Route::get('/players', [PlayerController::class, 'index'])->name('player.index');
Route::get('/players/create', [PlayerController::class, 'create'])->name('player.create');
Route::post('/players/create', [PlayerController::class, 'store'])->name('player.store');
Route::get('/players/{id}', [PlayerController::class, 'show'])->name('player.show');
Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
Route::post('/players/{id}/edit', [PlayerController::class, 'update'])->name('player.update');

Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/teams/create', [TeamController::class, 'store'])->name('team.store');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('team.show');
Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
Route::post('/teams/{id}/edit', [TeamController::class, 'update'])->name('team.update');
