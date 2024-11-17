<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/guru/dashboard', function () {
    return view('guru.dashboard');
});
Route::get('/guru/kelas', function () {
    return view('guru.kelas');
});
Route::get('/guru/e-rapor', function () {
    return view('guru.e-rapor');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/kelas', function () {
    return view('admin.kelas');
});
Route::get('/admin/daftar', function () {
    return view('admin.daftar');
});
Route::get('/admin/penilaian', function () {
    return view('admin.penilaian');
});
