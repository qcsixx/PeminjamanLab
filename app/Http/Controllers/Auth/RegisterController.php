<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani proses pendaftaran pengguna
    public function register(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20|unique:users,nim', // NIM opsional tapi harus unik jika diisi
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Mendaftarkan pengguna baru
        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim, // Bisa kosong
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_token' => Str::random(64), // Token untuk verifikasi email
        ]);

        // Kirim email verifikasi menggunakan Brevo
        Mail::send('auth.verify', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Verifikasi Akun Anda');
        });
        

        // Event untuk menandai pengguna telah mendaftar (opsional)
        event(new Registered($user));

        // Redirect dengan notifikasi
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan periksa email untuk verifikasi.');
    }

    // Menangani verifikasi email
    public function verifyEmail($token)
    {
        $user = User::where('email_verification_token', $token)->first();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token tidak valid atau sudah digunakan.');
        }
    
        $user->update([
            'email_verified_at' => now(),
            'email_verification_token' => null, // Hapus token setelah verifikasi
        ]);
    
        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi! Silakan login.');
    }
    
}
