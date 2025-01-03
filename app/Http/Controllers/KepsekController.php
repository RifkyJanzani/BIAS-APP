<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Rapor;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Siswa::distinct('kelas')->count();
        $siswa = Siswa::paginate(10);

        return view('kepalaSekolah.dashboard', compact('totalSiswa', 'totalKelas', 'siswa'));
    }

    public function erapor()
    {
        // Ambil data siswa untuk rapor triwulan
        $siswaTriwulan = Siswa::whereHas('rapor', function($query) {
            $query->where('periode', 'Triwulan');
        })->get();

        // Ambil data siswa untuk rapor akhir
        $siswaAkhir = Siswa::whereHas('rapor', function($query) {
            $query->where('periode', 'Akhir');
        })->get();

        // Kirim data ke view
        return view('kepalaSekolah.e-rapor.index', compact('siswaTriwulan', 'siswaAkhir'));
    }

    public function siswa()
    {
        $siswa = Siswa::all(); // Ambil semua data siswa
        return view('kepalaSekolah.siswa', compact('siswa'));
    }

    public function triwulan($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Triwulan')->first();

        return view('kepalaSekolah.e-rapor.triwulan', compact('siswa', 'rapor'));
    }

    public function akhir($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Akhir')->first();

        return view('kepalaSekolah.e-rapor.akhir', compact('siswa', 'rapor'));
    }

    // Otomatis Semester dan Tahun Ajaran
    // public function store(Request $request)
    // {
    //     // Validasi data yang diterima
    //     $request->validate([
    //         'nis' => 'required',
    //         'nilai_agama_budi_pekerti' => 'required',
    //         'nilai_jati_diri' => 'required',
    //         'nilai_literasi_steam' => 'required',
    //     ]);

    //     // Menentukan tahun ajaran dan semester
    //     $currentYear = date('Y');
    //     $currentMonth = date('n'); // Bulan saat ini (1-12)

    //     // Menentukan tahun ajaran
    //     if ($currentMonth >= 7) {
    //         $tahunAjaran = $currentYear . '/' . ($currentYear + 1);
    //     } else {
    //         $tahunAjaran = ($currentYear - 1) . '/' . $currentYear;
    //     }

    //     // Menentukan semester
    //     $semester = ($currentMonth >= 7) ? '1' : '2';

    //     // Menyimpan data rapor
    //     Rapor::create([
    //         'nis' => $request->nis,
    //         'nama_siswa' => $request->nama_siswa, // Pastikan ini ada di request
    //         'kelas' => $request->kelas, // Pastikan ini ada di request
    //         'semester' => $semester,
    //         'tahun_ajaran' => $tahunAjaran,
    //         'periode' => $request->periode, // Misalnya 'Triwulan'
    //         'nilai_agama_budi_pekerti' => $request->nilai_agama_budi_pekerti,
    //         'nilai_jati_diri' => $request->nilai_jati_diri,
    //         'nilai_literasi_steam' => $request->nilai_literasi_steam,
    //     ]);

    //     return redirect()->route('guru.e-rapor.index')->with('success', 'Data rapor berhasil disimpan.');
    // }
}
