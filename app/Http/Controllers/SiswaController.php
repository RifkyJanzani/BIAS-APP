<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil data siswa dari database
        $siswa = Siswa::all();
        return view('admin.daftar', compact('siswa'));
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

        // Filter siswa berdasarkan kelas
        // $kelasDipilih = $request->input('kelas');
        // if ($kelasDipilih) {
        //     $siswa = Siswa::where('kelas', $kelasDipilih)->get();
        // } else {
            
        // }

        $siswa = Siswa::all();

        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahKelas', 'kelasSiswa', 'siswa'));
    }

    public function create()
    {
        return view('admin.siswa-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'kelas' => 'required|string|max:50',
            'umur' => 'required|integer',
            'gender' => 'required|string|in:L,P',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            // Cek jika ada file foto
            if ($request->hasFile('photo')) {
                // Simpan foto di public/upload dengan nama yang unik
                $photoName = time() . '-' . $request->file('photo')->getClientOriginalName();
                $photoPath = $request->file('photo')->move(public_path('upload'), $photoName);
                $photoPath = 'upload/' . $photoName; // Path relatif yang disimpan di database
            } else {
                // Jika tidak ada foto, biarkan null atau beri path default
                $photoPath = null;
            }

        // Simpan data siswa ke database
        Siswa::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'photo' => $photoPath, // Simpan path relatif atau null jika tidak ada foto
        ]);

        return redirect()->route('admin.daftar')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Cari data siswa berdasarkan ID
        return view('admin.siswa-edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'umur' => 'required|integer',
            'gender' => 'required|string|in:L,P',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('admin.daftar')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.daftar')->with('success', 'Data siswa berhasil dihapus.');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return redirect()->route('admin.daftar')->with('success', 'Data siswa berhasil diimpor.');
    }
}
