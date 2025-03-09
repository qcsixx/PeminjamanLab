<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Halaman landing page
Route::get('/', function () {
    return view('landing');
});

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route untuk halaman register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route untuk lupa password
Route::get('/lupa-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/lupa-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route untuk verifikasi email
Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('verification.verify');


// Middleware Auth untuk redirect sesuai role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user(); // Pastikan auth dipanggil dengan benar
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    // Route untuk dashboard Admin
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    // Route untuk dashboard User
    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('/dashboard-user', [UserController::class, 'index'])->name('user.dashboard');
    });

    // Route untuk logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// **Group untuk User (Peminjam)**
Route::get('/user/dashboard-user', [UserController::class, 'showPeminjam'])->name('user.dashboard-user');

// **Group untuk Admin (Kepala Lab)**
Route::get('/admin/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard-admin');
Route::get('/admin/manajemen-barang', function () {
    return view('admin.manajemen-barang'); // Sesuaikan dengan nama file di folder resources/views
});
Route::get('/admin/persetujuan-peminjaman', function () {
    return view('admin.persetujuan-peminjaman'); // Sesuaikan dengan nama file di folder resources/views
});
Route::get('/admin/laporan-peminjaman', function () {
    return view('admin.laporan-peminjaman'); // Sesuaikan dengan nama file di folder resources/views
});
Route::get('/admin/pelacakan-barang', function () {
    return view('admin.pelacakan-barang'); // Sesuaikan dengan nama file di folder resources/views
});
Route::get('/admin/pengelolaan-user', function () {
    return view('admin.pengelolaan-user'); // Sesuaikan dengan nama file di folder resources/views
});

Route::get('/user/peminjaman', function () {
    return view('user.peminjaman'); // Sesuaikan dengan nama file di folder resources/views
});

Route::get('/user/status-peminjaman', function () {
    return view('user.status-peminjaman'); // Sesuaikan dengan nama file di folder resources/views
});
Route::get('/user/pelacakan', function () {
    return view('user.pelacakan'); // Sesuaikan dengan nama file di folder resources/views
});
