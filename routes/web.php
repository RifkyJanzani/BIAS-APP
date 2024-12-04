<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaCOntroller;
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
    })->name('guru.dashboard');

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
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('admin.dashboard');

    // Kelas
    Route::get('/kelas', function () {
        return view('admin.kelas');
    });

    // Daftar
    Route::get('/daftar', [SiswaController::class, 'index'])->name('admin.daftar');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/import', [SiswaController::class, 'import'])->name('import');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}/delete', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Penilaian
    Route::get('/penilaian', function () {
        return view('admin.penilaian');
    });
});
