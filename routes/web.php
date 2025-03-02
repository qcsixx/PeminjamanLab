<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Halaman landing page
Route::get('/', function () {
    return view('landing');
});

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route untuk halaman lupa password
Route::get('/password/reset', [LoginController::class, 'showLinkRequestForm'])->name('password.request');

// Menampilkan halaman register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

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