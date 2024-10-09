<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JawatanController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\BahagianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Authenticate\LoginController;

Route::get('/', [GuestController::class, 'homepage']);
// Route::get(uri, function);
Route::get('/login', [LoginController::class, 'borangLogin']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);

// Route untuk pengurusan users
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);



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
// Kecualikan method/function yang tak diperlukan.
Route::resource('jawatan', JawatanController::class)->except('show');
// Pilih method/function yang nak digunakan sahaja.
Route::resource('bahagian', BahagianController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
Route::resource('unit', UnitController::class);
Route::resource('tugas', TugasController::class);



