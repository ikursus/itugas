<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'homepage']);
// Route::get(uri, function);
Route::get('/login', [LoginController::class, 'borangLogin']);

// Routing parameter
Route::get('/tugasan/{id?}', function ($id = NULL) {

    if (is_null($id))
    {
        return 'Tiada ID dibekalkan';
    }

    echo 'Tugas ke-' . $id;
    echo '<br>';
    echo 'Tugas ke- . $id';
    echo '<br>';
    echo "Tugas ke-$id";
});
