<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::post('/api/register', [RegisterController::class, 'register'])->name('register');

Route::post('/api/login', [RegisterController::class, 'login'])->name('login');

Route::get('/api/profile', [RegisterController::class, 'profile'])->name('profile')->middleware('auth:api');