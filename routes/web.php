<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Redirect homepage
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('beranda')
        : redirect()->route('login');
});

// Guest routes (login)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Beranda
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');

    // Daftar Buku
    Route::resource('buku', BukuController::class)->except(['show']);

    // Favorit
    Route::get('/favorit', function () {
        return view('favorit');
    })->name('favorit');

    // Aktivitas
    Route::get('/aktivitas', function () {
        return view('aktivitas');
    })->name('aktivitas');

    // Akun
    Route::get('/akun', function () {
        return view('akun');
    })->name('akun');
});