<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

// Grup route untuk Guru
Route::prefix('guru')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('guru.dashboard');
    });

    // Kelas
    Route::get('/kelas', function () {
        return view('guru.kelas');
    });

    // E-Rapor
    Route::get('/e-rapor', function() {
        return view('guru.e-rapor.index');
    })->name('guru.e-rapor');

    Route::get('/e-rapor/siswa', function() {
        return view('guru.e-rapor.siswa');
    })->name('guru.e-rapor.siswa');

    Route::get('/e-rapor/triwulan', function() {
        return view('guru.e-rapor.triwulan');
    })->name('guru.e-rapor.triwulan');

    Route::get('/e-rapor/akhir', function() {
        return view('guru.e-rapor.akhir');
    })->name('guru.e-rapor.akhir');
});

// Grup route untuk Admin
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Kelas
    Route::get('/kelas', function () {
        return view('admin.kelas');
    });

    // Daftar
    Route::get('/daftar', function () {
        return view('admin.daftar');
    });

    // Penilaian
    Route::get('/penilaian', function () {
        return view('admin.penilaian');
    });
});
