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
use App\Http\Controllers\ExportExcelController;

// Route halaman utama aplikasi
Route::get('/', [GuestController::class, 'homepage'])->name('halaman.utama');

// Route::get(uri, function);
Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Protected semua routing yang terlibat. Perlu login untuk buka
Route::group(['middleware' => 'auth'], function () {

    // Route untuk logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Route untuk dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route untuk pengurusan profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::patch('/profil', [ProfilController::class, 'update'])->name('profil.update');

    Route::resource('tugas', TugasController::class)->only('index', 'create', 'store', 'show');


    // Route yang memerlukan role admin untuk dibuka
    Route::middleware('role:Admin')->group(function () {

        Route::get('/export/users', [ExportExcelController::class, 'exportUsers'])->name('export.users');

        // Route untuk pengurusan users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



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
        Route::resource('unit', UnitController::class)->except('show');

    });




});

