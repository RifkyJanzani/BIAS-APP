<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Siswa::distinct('kelas')->count();
        $siswa = Siswa::paginate(10);

        return view('guru.dashboard', compact('totalSiswa', 'totalKelas', 'siswa'));
    }

    public function erapor()
    {
        $siswa = Siswa::paginate(10);
        return view('guru.e-rapor.index', compact('siswa'));
    }

    public function showSiswa($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        return view('guru.e-rapor.siswa', compact('siswa'));
    }

    public function triwulan($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        return view('guru.e-rapor.triwulan', compact('siswa'));
    }

    public function akhir($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        return view('guru.e-rapor.akhir', compact('siswa'));
    }
}
