<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoutingController::class, 'home'])->name('home');
Route::get('/about', [RoutingController::class, 'about'])->name('about');
Route::get('/post', [RoutingController::class, 'post'])->name('post');
Route::get('/contact', [RoutingController::class, 'contact'])->name('contact');