<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function borangLogin() {

        // Function view() akan buka folder bernama resources/views
        return view('auth.template-borang-login');

    }

    public function authenticate(Request $request)
    {
        return redirect('/dashboard');
    }

    public function logout()
    {
        return redirect('/login');
    }
}
