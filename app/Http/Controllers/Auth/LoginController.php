<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login pengguna
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username_email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah input username_email adalah email atau username
        $credentials = filter_var($request->username_email, FILTER_VALIDATE_EMAIL)
            ? ['email' => $request->username_email]
            : ['username' => $request->username_email];  // Jika menggunakan username

        $credentials['password'] = $request->password;

        // Coba login
        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        throw ValidationException::withMessages([
            'username_email' => ['The provided credentials do not match our records.'],
        ]);
    }

    // Menampilkan halaman lupa password
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
