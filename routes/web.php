<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Authenticate\LoginController;

Route::get('/', [GuestController::class, 'homepage']);
// Route::get(uri, function);
Route::get('/login', [LoginController::class, 'borangLogin']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);

// Paparkan senarai perkara
// Route::get('/perkara', [PerkaraController::class, 'index']);
// // Paparkan borang tambah perkara baru
// Route::get('/perkara/create', [PerkaraController::class, 'create']);
// // Dapatkan data daripada borang tambah perkara baru
// Route::post('/perkara/create', [PerkaraController::class, 'store']);
// // Paparkan borang edit perkara berdasarkan ID
// Route::get('/perkara/{id}/edit', [PerkaraController::class, 'edit']);
// // Dapatkan data daripada borang edit perkara
// Route::patch('/perkara/{id}', [PerkaraController::class, 'update']);
// // Hapus perkara berdasarkan ID
// Route::delete('/perkara/{id}', [PerkaraController::class, 'destroy']);

Route::resource('perkara', PerkaraController::class);


