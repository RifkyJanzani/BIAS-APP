<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\CapaianController;
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

    Route::get('/kelas/siswa/{nis}', [GuruController::class, 'daftarPekan'])->name('guru.kelas.daftar-pekan');

    Route::get('/kelas/siswa/{nis}/{bulan}/{pekan}', [GuruController::class, 'penilaian'])->name('guru.kelas.penilaian');

    // submit capaian
    Route::post('/kelas/siswa/store', [GuruController::class, 'submitPenilaian'])->name('submit.penilaian');

    //update capaian
    Route::put('/kelas/siswa/update', [GuruController::class, 'updatePenilaian'])->name('update.penilaian');

    // generate gemini
    Route::post('/kelas/siswa/generateTriwulan', [GeminiController::class, 'generateRapor'])->name('generateRaporTriwulan.gemini');

    // E-Rapor
    Route::get('/e-rapor', [GuruController::class, 'erapor'])->name('guru.e-rapor');

    Route::get('/e-rapor/siswa/{nis}', [GuruController::class, 'showSiswa'])->name('guru.e-rapor.siswa');

    Route::get('/e-rapor/triwulan/{nis}', [GuruController::class, 'triwulan'])->name('guru.e-rapor.triwulan');

    Route::get('/e-rapor/akhir/{nis}', [GuruController::class, 'akhir'])->name('guru.e-rapor.akhir');
});

// Grup route untuk Admin
Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [KelasController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/dashboard/{kelas}', [KelasController::class, 'dashboard'])->name('admin.dashboard');
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
    // Capaian
    Route::get('/capaian', [CapaianController::class, 'index'])->name('admin.capaian.index');
    Route::get('/capaian/create', [CapaianController::class, 'create'])->name('admin.capaian.create');
    Route::post('/capaian/store', [CapaianController::class, 'store'])->name('admin.capaian.store');
    Route::get('/capaian/{id}/edit', [CapaianController::class, 'edit'])->name('admin.capaian.edit');
    Route::put('/capaian/{id}/update', [CapaianController::class, 'update'])->name('admin.capaian.update');
    Route::delete('/capaian/{id}/delete', [CapaianController::class, 'destroy'])->name('admin.capaian.destroy');
});

Route::prefix('kepsek')->middleware('auth', 'kepalaSekolah')->group(function () {
    Route::get('/dashboard', [KepsekController::class, 'dashboard'])->name('kepalaSekolah.dashboard');
    Route::get('/siswa', [KepsekController::class, 'siswa'])->name('kepalaSekolah.siswa');
    Route::get('/guru', [KepsekController::class, 'guru'])->name('kepalaSekolah.guru');

    Route::get('/e-rapor', [KepsekController::class, 'erapor'])->name('kepsek.e-rapor');

    Route::get('/e-rapor/triwulan/{nis}', [KepsekController::class, 'triwulan'])->name('kepsek.e-rapor.triwulan');

    Route::get('/e-rapor/akhir/{nis}', [KepsekController::class, 'akhir'])->name('kepsek.e-rapor.akhir');
});

Route::get('/generate-pdf/{nis}', [PDFController::class, 'generatePDF'])->name('generate.pdf');

require __DIR__ . '/auth.php';

// Coba Gemini

// To display the view
Route::get('/gem', function () {
    return view('test-gemini');
});

// Handle form submission.
Route::post('/question', [GeminiController::class, 'index']);
