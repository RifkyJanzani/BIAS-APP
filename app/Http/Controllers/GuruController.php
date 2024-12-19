<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $kelas = Siswa::select('kelas', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kelas')
            ->get();

        return view('guru.kelas.index', compact('kelas'));
    }
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
    public function show($kelas)
    {
        // Ambil siswa berdasarkan kelas yang dipilih
        $siswa = Siswa::where('kelas', $kelas)->get();

        return view('guru.kelas.daftar-siswa', compact('kelas', 'siswa'));
    }

    public function daftarPekan($nis)
    {
        // Ambil data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $nis)->first();

        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            abort(404, 'Siswa tidak ditemukan');
        }

        // Kirim data siswa ke view
        return view('guru.kelas.daftar-pekan', [
            'nis' => $siswa->nis,
            'nama' => $siswa->name
        ]);
    }

    public function eraporPilihan($id)
    {
        // Ambil data siswa berdasarkan ID
        return view('guru.e-rapor-pilihan');
    }

} 
