<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard()
    {
        $jumlahSiswa = Siswa::count();

        // Hitung jumlah kelas unik
        $jumlahKelas = Siswa::distinct('kelas')->count('kelas');

        // Ambil daftar kelas dan hitung jumlah siswa per kelas
        $kelasSiswa = Siswa::select('kelas', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kelas')
            ->get();

        // Filter siswa berdasarkan kelas
        // $kelasDipilih = $request->input('kelas');
        // if ($kelasDipilih) {
        //     $siswa = Siswa::where('kelas', $kelasDipilih)->get();
        // } else {
            
        // }

        $siswa = Siswa::all();

        return view('guru.dashboard', compact('jumlahSiswa', 'jumlahKelas', 'kelasSiswa', 'siswa'));
    }
    public function eraporPilihan($id)
    {
        // Ambil data siswa berdasarkan ID
        return view('guru.e-rapor-pilihan');
    }
} 
