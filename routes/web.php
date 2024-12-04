<?php

use App\Http\Controllers\GuruController;
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
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');

    // Kelas
    Route::get('/kelas', function () {
        return view('guru.kelas.index');
    })->name('guru.kelas');

    Route::get('/kelas/daftar-siswa', function () {
        return view('guru.kelas.daftar-siswa');
    })->name('guru.kelas.daftar-siswa');

    // Bisa pakai ini jika sudah diintegrasi backend
    // Route::get('/kelas/daftar-siswa/{nis}', function ($nis) {
    //     return view('guru.kelas.daftar-pekan', compact('id'));
    // })->name('guru.kelas.daftar-siswa');

    Route::get('/kelas/daftar-siswa/{nis}', function ($nis) {
        return view('guru.kelas.daftar-pekan', compact('nis'));
    })->name('guru.kelas.daftar-pekan');

    Route::get('/kelas/daftar-siswa/{nis}/{bulan}/{pekan}', function ($nis, $bulan, $pekan) {
        return view('guru.kelas.penilaian', compact('nis', 'bulan', 'pekan'));
    })->name('guru.kelas.penilaian');

    // E-Rapor
    Route::get('/e-rapor', function () {
        return view('guru.e-rapor.index');
    })->name('guru.e-rapor');

    Route::get('/e-rapor/siswa', function () {
        return view('guru.e-rapor.siswa');
    })->name('guru.e-rapor.siswa');

    Route::get('/e-rapor/triwulan', function () {
        return view('guru.e-rapor.triwulan');
    })->name('guru.e-rapor.triwulan');

    Route::get('/e-rapor/akhir', function () {
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
