<?php

use App\Http\Controllers\EmployersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

// home rutata taka neka stoi
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/admin/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('home.logout');
Route::post('/admin/authentication', [HomeController::class, 'authentication'])->name('home.authentication');

// url za proekt ce ni treba
// Route::get('/project/create', [ProjectsController::class, 'create']);
Route::post('/project/create', [ProjectsController::class, 'store']);
Route::get('/project/{id}', [ProjectsController::class, 'show']);
Route::post('/project/{id}/edit', [ProjectsController::class, 'edit']);
Route::post('/project/{id}/delete', [ProjectsController::class, 'delete']);

Route::post('/employer/add', [EmployersController::class, 'add']);
