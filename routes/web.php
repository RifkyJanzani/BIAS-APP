<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\GeminiController;

Route::get('/', function () {
    // Jika pengguna sudah login, arahkan ke dashboard berdasarkan role
    if (Auth::check()) {
        $user = Auth::user();
        // Redirection berdasarkan role
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'guru') {
            return redirect()->route('guru.dashboard');
        } elseif ($user->role == 'kepalaSekolah') {
            return redirect()->route('kepalaSekolah.dashboard');
        }
    }
    // Jika pengguna belum login, arahkan ke halaman login
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grup route untuk Guru
Route::prefix('guru')->middleware('auth', 'guru')->group(function () {
    // Dashboard
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');

    // Kelas
    Route::get('/kelas', [GuruController::class, 'index'])->name('guru.kelas.index');

    Route::get('/kelas/{kelas}', [GuruController::class, 'show'])->name('guru.kelas.daftar-siswa');

    Route::get('/kelas/daftar-siswa/{nis}', [GuruController::class, 'daftarPekan'])->name('guru.kelas.daftar-pekan');

    Route::get('/kelas/daftar-siswa/{nis}/{bulan}/{pekan}', [GuruController::class, 'penilaian'])->name('guru.kelas.penilaian');

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
Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('admin.dashboard');

    // Akun
    Route::get('/akun', [AkunController::class, 'index'])->name('admin.akun');
    Route::get('/akun/create', [AkunController::class, 'create'])->name('admin.akun.create');
    Route::post('/akun/store', [AkunController::class, 'store'])->name('akun.store');
    Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/akun/{id}/update', [AkunController::class, 'update'])->name('akun.update');
    Route::put('/akun/{id}/update', [AkunController::class, 'update'])->name('akun.update');
    Route::delete('/akun/{id}/delete', [AkunController::class, 'destroy'])->name('akun.destroy');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('admin.kelas.show');

    // Daftar
    Route::get('/daftar', [SiswaController::class, 'index'])->name('admin.daftar');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/import', [SiswaController::class, 'import'])->name('import');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}/delete', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Penilaian
    Route::get('/penilaian', function () {
        return view('admin.penilaian');
    });
});

Route::prefix('kepsek')->middleware('auth', 'kepalaSekolah')->group(function () {
    Route::get('/dashboard', function () {
        return view('kepalaSekolah.dashboard');
    })->name('kepalaSekolah.dashboard');
});

require __DIR__ . '/auth.php';

// Coba Gemini

// To display the view
Route::get('/gem', function () {
    return view('test-gemini');
});

// Handle form submission.
Route::post('/question', [GeminiController::class, 'index']);
