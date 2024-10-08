<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Method/Function untuk paparkan halaman utama aplikasi
    // public - Boleh digunakan di luar class
    // protected - Boleh digunakan oleh class yang terlibat dan keturunannya
    // private - Boleh digunakan oleh class yang terlibat sahaja
    public function homepage() {

        // Function view() akan buka folder bernama resources/views
        return view('template-homepage');

    }
}
