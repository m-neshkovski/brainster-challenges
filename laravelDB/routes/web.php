<?php

use App\Http\Controllers\EmployersController;
use App\Http\Controllers\ProjectsController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

// home rutata taka neka stoi
Route::get('/', function () {
    $cards = Project::all();
    return view('welcome', ['cards' => $cards]);
})->name('home');

// url za proekt ce ni treba
Route::get('/project/create', [ProjectsController::class, 'create']);
Route::post('/project/create', [ProjectsController::class, 'validate']);

Route::get('/project/{id}', [ProjectsController::class, 'show']);

Route::post('/employer/add', [EmployersController::class, 'add']);
