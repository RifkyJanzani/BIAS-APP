<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard()
    {
        $jumlahSiswa = Siswa::count();
        // Ambil data siswa dari database
        $siswa = Siswa::all(); // Atau bisa disesuaikan dengan kondisi lain jika ada filter atau pagination

        // Kirim data siswa ke view
        return view('guru.dashboard', compact('jumlahSiswa','siswa'));
    }
    public function eraporPilihan($id)
    {
        // Ambil data siswa berdasarkan ID
        return view('guru.e-rapor-pilihan');
    }
} 
