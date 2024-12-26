<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Capaian;
use App\Models\PenilaianSiswa;
use Illuminate\Support\Facades\DB;
use App\Models\Rapor;
use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

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
        $penilaian = PenilaianSiswa::where('nis', $nis)->get();
        // dd($penilaian);

        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            abort(404, 'Siswa tidak ditemukan');
        }

        // Kirim data siswa ke view
        return view('guru.kelas.daftar-pekan', compact('penilaian'), [
            'nis' => $siswa->nis,
            'nama' => $siswa->name
        ]);
    }

    public function penilaian($nis, $bulan, $pekan)
    {
        // Ambil data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $nis)->first();
        $capaian = Capaian::all();
        $penilaian = PenilaianSiswa::where('nis', $nis)->where('bulan', $bulan)->where('pekan', $pekan)->get();
        // $capaianAgama = Capaian::where('kriteria', 'Nilai Agama dan Budi Pekerti')->get();
        // $capaianJatiDiri = Capaian::where('kriteria', 'Jati Diri')->get();
        // $capaianLiterasi = Capaian::where('kriteria', 'Dasar Literasi dan STEAM')->get();
        $kriterias = Capaian::distinct()->get(['kriteria']);
        $kriterias = $kriterias->pluck('kriteria')->toArray();
        $capaianBulanCount = PenilaianSiswa::select('bulan')->where('nis', $siswa->nis)->distinct()->get()->count();
        $capaianCount = PenilaianSiswa::select('bulan', 'pekan')->where('nis', $siswa->nis)->distinct()->get()->count();
        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            abort(404, 'Siswa tidak ditemukan');
        }

        // Kirim data siswa ke view
        return view('guru.kelas.penilaian', compact('capaian', 'penilaian', 'kriterias', 'capaianBulanCount', 'capaianCount'), [
            'nis' => $siswa->nis,
            'nama' => $siswa->name,
            'bulan' => $bulan,
            'pekan' => $pekan,
        ]);
    }

    public function submitPenilaian(Request $request)
    {
        // Mengambil data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $request->input('nis'))->first();
        $capaians = Capaian::all();
        $kriterias = Capaian::distinct()->get(['kriteria']);
        $kriterias = $kriterias->pluck('kriteria')->toArray();

        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            abort(404, 'Siswa tidak ditemukan');
        }

        // Validasi input
        $request->validate([
            'bulan' => 'required',
            'pekan' => 'required',
        ]);
        // Mengambil data capaian yang dimulai dengan 'capaian_'
        $capaianData = collect($request->all())->filter(function ($value, $key) {
            return strpos($key, 'capaian_') === 0;
        });
        // Simpan data penilaian ke database
        foreach ($capaianData as $key => $value) {
            $idCapaian = str_replace('capaian_', '', $key); // Mengambil ID capaian dari key
            $capaian = Capaian::find($idCapaian); // Ambil data capaian berdasarkan ID
            if ($capaian) {
                PenilaianSiswa::create([
                    'nis' => $siswa->nis,
                    'id_capaian' => $capaian->id,
                    'bulan' => $request->input('bulan'),
                    'pekan' => $request->input('pekan'),
                    'capaian' => $value, // Nilai capaian
                ]);
            }
        }

        // UNTUK RAPOR TRIWULAN
        // Memeriksa apakah data capaian sudah terisi 3 bulan
        $capaianBulanCount = PenilaianSiswa::select('bulan')->where('nis', $siswa->nis)->distinct()->get()->count();
        $capaianCount = PenilaianSiswa::select('bulan', 'pekan')->where('nis', $siswa->nis)->distinct()->get()->count();
        // dd($capaianCount);
        if ($capaianBulanCount == 3 && $capaianCount == 12) {
            session(['isGeneratingRapor' => true]);
            $bulanUrutan = [
                'januari' => 1,
                'februari' => 2,
                'maret' => 3,
                'april' => 4,
                'mei' => 5,
                'juni' => 6,
                'juli' => 7,
                'agustus' => 8,
                'september' => 9,
                'oktober' => 10,
                'november' => 11,
                'desember' => 12,
            ];

            $bulanDanPekan = PenilaianSiswa::select('bulan', 'pekan')
                ->where('nis', $siswa->nis)
                ->distinct()
                ->orderByRaw('FIELD(bulan, "' . implode('","', array_keys($bulanUrutan)) . '")')
                ->orderBy('pekan')
                ->get();

            // $promptCapaian = [];
            foreach ($bulanDanPekan as $item) {
                $bulan = $item->bulan;  // Mengambil nilai bulan
                $pekan = $item->pekan;  // Mengambil nilai pekan
                $capaianData = PenilaianSiswa::join('capaians', 'penilaian_siswas.id_capaian', '=', 'capaians.id')
                    ->select('capaians.pernyataan as capaian_pernyataan', 'penilaian_siswas.capaian as siswa_capaian', 'capaians.kriteria as capaian_kriteria')
                    ->where('penilaian_siswas.nis', $siswa->nis)
                    ->where('penilaian_siswas.bulan', $bulan)
                    ->where('penilaian_siswas.pekan', $pekan)
                    ->get()->toArray();
                $arrayPromptCapaian[$bulan][$pekan] = $capaianData;
            }
            $answers = [];
            $prompts = [];
            // dd($arrayPromptCapaian);
            set_time_limit(1000);
            foreach ($kriterias as $kriteria) {
                $promptCapaian = 'Bagaimana penilaian kriteria ' . $kriteria . ' siswa yang bernama ' . $siswa->name . ' yang perkembangannya sebagai berikut:' . "\n\n";
                // Loop untuk menjelajahi setiap bulan
                foreach ($arrayPromptCapaian as $bulan => $pekanData) {
                    // Tambahkan nama bulan ke hasil
                    $promptCapaian .= "Bulan " . ucfirst($bulan) . "\n";

                    // Loop untuk setiap pekan dalam bulan
                    foreach ($pekanData as $pekan => $capaian) {
                        $promptCapaian .= "Pekan " . $pekan . ":\n";
                        // Loop untuk setiap capaian dalam pekan
                        foreach ($capaian as $capaianItem) {
                            if ($capaianItem['capaian_kriteria'] != $kriteria) {
                                continue;
                            } else {
                                // Menentukan apakah siswa sudah mencapai capaian tersebut atau belum
                                $status = $capaianItem['siswa_capaian'] == 1 ? "Muncul" : "Belum Muncul";

                                // Menambahkan pernyataan capaian dan status ke hasil
                                $promptCapaian .= $capaianItem['capaian_pernyataan'] . " (" . $status . ")\n";
                            }
                        }
                        $promptCapaian .= "\n"; // Untuk memberikan spasi antar pekan
                    }
                    $promptCapaian .= "\n"; // Untuk memberikan spasi antar bulan
                }
                // dd($promptCapaian);
                $prompts[$kriteria] = $promptCapaian;
                $client = new Client(env('GEMINI_API_KEY'));
                $response = $client->geminiPro()->generateContent(
                    new TextPart($promptCapaian),
                );
                $answer = $response->text();
                $answers[$kriteria] = $answer;

                // Karena Gemini API limit
                sleep(120); // Jeda selama 2 menit
            }
            // dd($prompts);
            set_time_limit(60);
            // dd($answers);
            Rapor::create([
                'nis' => $siswa->nis,
                'semester' => 1,
                'tahun_ajaran' => '2024/2025',
                'periode' => 'Triwulan',
                'nilai_agama_budi_pekerti' => $answers['Nilai Agama dan Budi Pekerti'],
                'nilai_jati_diri' => $answers['Jati Diri'],
                'nilai_literasi_steam' => $answers['Dasar Literasi dan STEAM'],
            ]);
            session()->forget('isGeneratingRapor');
        }

        return redirect()->route('guru.kelas.penilaian', ['nis' => $siswa->nis, 'bulan' => $request->input('bulan'), 'pekan' => $request->input('pekan')])->with('success', 'Penilaian siswa berhasil ditambahkan.');
    }

    public function updatePenilaian(Request $request)
    {
        // Validasi input
        $request->validate([
            'bulan' => 'required',
            'pekan' => 'required',
        ]);

        // Mengambil data capaian yang dimulai dengan 'capaian_'
        $capaianData = collect($request->all())->filter(function ($value, $key) {
            return strpos($key, 'capaian_') === 0;
        });

        // Simpan data penilaian ke database
        foreach ($capaianData as $key => $value) {
            $idCapaian = str_replace('capaian_', '', $key); // Mengambil ID capaian dari key
            $capaian = Capaian::find($idCapaian); // Ambil data capaian berdasarkan ID
            if ($capaian) {
                $penilaian = PenilaianSiswa::where('nis', $request->input('nis'))
                    ->where('id_capaian', $capaian->id)
                    ->where('bulan', $request->input('bulan'))
                    ->where('pekan', $request->input('pekan'))
                    ->first();

                if ($penilaian) {
                    $penilaian->capaian = $value; // Nilai capaian
                    $penilaian->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Penilaian siswa berhasil diubah.');
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
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Triwulan')->first();

        return view('guru.e-rapor.triwulan', compact('siswa', 'rapor'));
    }

    public function akhir($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Akhir')->first();

        return view('guru.e-rapor.akhir', compact('siswa', 'rapor'));
    }

    public function eraporPilihan($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $rapor = Rapor::where('nis', $nis)->where('periode', 'Akhir')->first();

        return view('guru.e-rapor.akhir', compact('siswa', 'rapor'));
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
