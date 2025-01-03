<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Ambil daftar kelas dan jumlah siswa per kelas
        $kelas = Siswa::select('kelas', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kelas')
            ->get();

        return view('admin.kelas.index', compact('kelas'));
    }

    public function show($kelas)
    {
        // Ambil siswa berdasarkan kelas yang dipilih
        $siswa = Siswa::where('kelas', $kelas)->get();

        return view('admin.kelas.show', compact('kelas', 'siswa'));
    }

    public function dashboard(Request $request)
    {
        // Ambil jumlah siswa
        $jumlahSiswa = Siswa::count();
    
        // Hitung jumlah kelas unik
        $jumlahKelas = Siswa::distinct('kelas')->count('kelas');
    
        // Ambil daftar kelas dan hitung jumlah siswa per kelas
        $kelasSiswa = Siswa::select('kelas', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kelas')
            ->get();
    
        // Filter siswa berdasarkan kelas yang dipilih
        $kelasDipilih = $request->input('kelas');
        if ($kelasDipilih) {
            $siswa = Siswa::where('kelas', $kelasDipilih)->paginate(10);
        } else {
            $siswa = Siswa::paginate(10);
        }
    
        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahKelas', 'kelasSiswa', 'siswa', 'kelasDipilih'));
    }
}
