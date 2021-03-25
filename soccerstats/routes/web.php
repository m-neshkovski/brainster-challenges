<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('players')->group(function () {
        Route::middleware('admin')->group(function() {
            Route::get('/create', [PlayerController::class, 'create'])->name('player.create');
            Route::post('/create', [PlayerController::class, 'store'])->name('player.store');
            Route::get('/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
            Route::post('/{id}/edit', [PlayerController::class, 'update'])->name('player.update');
            Route::post('/{id}/delete', [PlayerController::class, 'destroy'])->name('player.destroy');
        });
        Route::get('/', [PlayerController::class, 'index'])->name('player.index');
        Route::get('/{id}', [PlayerController::class, 'show'])->name('player.show');
    });
    
    Route::prefix('teams')->group(function () {
        Route::middleware('admin')->group(function() {
            Route::get('/create', [TeamController::class, 'create'])->name('team.create');
            Route::post('/create', [TeamController::class, 'store'])->name('team.store');
            Route::get('/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
            Route::post('/{id}/edit', [TeamController::class, 'update'])->name('team.update');
            Route::post('/{id}/delete', [TeamController::class, 'destroy'])->name('team.destroy');
        });
        Route::get('/', [TeamController::class, 'index'])->name('team.index');
        Route::get('/{id}', [TeamController::class, 'show'])->name('team.show');
    });
    
    Route::prefix('matches')->group(function () {
        Route::middleware('admin')->group(function() {
            Route::get('/create', [GameController::class, 'create'])->name('match.create');
            Route::post('/create', [GameController::class, 'store'])->name('match.store');
            Route::get('/{id}/edit', [GameController::class, 'edit'])->name('match.edit');
            Route::post('/{id}/edit', [GameController::class, 'update'])->name('match.update');
            Route::post('/{id}/delete', [GameController::class, 'destroy'])->name('match.destroy');
        });
        Route::get('/', [GameController::class, 'index'])->name('match.index');
        Route::get('/{id}', [GameController::class, 'show'])->name('match.show');
    });
});

