<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'homepage']);
// Route::get(uri, function);
Route::get('/login', [LoginController::class, 'borangLogin']);

Route::get('/dashboard', [DashboardController::class, 'index']);
