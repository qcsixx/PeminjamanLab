<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form lupa password.
     */
    public function showLinkRequestForm()
    {
        return view('auth.lupa-password');
    }

    /**
     * Mengirim email reset password.
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi email harus ada di database
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Kirim link reset password
        $status = Password::sendResetLink($request->only('email'));

        // Redirect kembali dengan notifikasi sukses/gagal
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Tautan reset password telah dikirim ke email Anda.')
            : back()->withErrors(['email' => 'Gagal mengirim tautan reset password. Coba lagi nanti.']);
    }
}
