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
}
