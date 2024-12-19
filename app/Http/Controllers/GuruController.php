<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use App\Models\Rapor;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
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

    public function penilaian($nis, $bulan, $pekan)
    {
        // Ambil data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $nis)->first();

        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            abort(404, 'Siswa tidak ditemukan');
        }

        // Kirim data siswa ke view
        return view('guru.kelas.penilaian', [
            'nis' => $siswa->nis,
            'nama' => $siswa->name,
            'bulan' => $bulan,
            'pekan' => $pekan,
        ]);
    }

    public function eraporPilihan($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Akhir')->first();

        return view('guru.e-rapor.akhir', compact('siswa', 'rapor'));
    }

    // Otomatis Semester dan Tahun Ajaran
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nis' => 'required',
            'nilai_agama_budi_pekerti' => 'required',
            'nilai_jati_diri' => 'required',
            'nilai_literasi_steam' => 'required',
        ]);

        // Menentukan tahun ajaran dan semester
        $currentYear = date('Y');
        $currentMonth = date('n'); // Bulan saat ini (1-12)

        // Menentukan tahun ajaran
        if ($currentMonth >= 7) {
            $tahunAjaran = $currentYear . '/' . ($currentYear + 1);
        } else {
            $tahunAjaran = ($currentYear - 1) . '/' . $currentYear;
        }

        // Menentukan semester
        $semester = ($currentMonth >= 7) ? '1' : '2';

        // Menyimpan data rapor
        Rapor::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa, // Pastikan ini ada di request
            'kelas' => $request->kelas, // Pastikan ini ada di request
            'semester' => $semester,
            'tahun_ajaran' => $tahunAjaran,
            'periode' => $request->periode, // Misalnya 'Triwulan'
            'nilai_agama_budi_pekerti' => $request->nilai_agama,
            'nilai_jati_diri' => $request->nilai_jati_diri,
            'nilai_literasi_steam' => $request->nilai_literasi_steam,
        ]);

        return redirect()->route('guru.e-rapor.index')->with('success', 'Data rapor berhasil disimpan.');
    }
}
