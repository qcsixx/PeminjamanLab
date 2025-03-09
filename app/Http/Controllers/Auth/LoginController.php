<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'login' => 'required|string', // Bisa Email atau NIM
            'password' => 'required|string',
        ]);

        // Tentukan apakah login menggunakan email atau NIM
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nim';

        // Coba login dengan kredensial yang sesuai
        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('dashboard')); // Arahkan ke dashboard
        }

        // Jika login gagal
        throw ValidationException::withMessages([
            'login' => ['Email atau NIM dan password tidak cocok dengan data kami.'],
        ]);
    }

    // Menampilkan halaman lupa password
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
