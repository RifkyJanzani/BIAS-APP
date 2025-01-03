<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Query siswa berdasarkan pencarian
        $siswa = Siswa::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('nis', 'like', "%{$search}%")
                         ->orWhere('kelas', 'like', "%{$search}%");
        })->paginate(10); // Gunakan paginate untuk navigasi
    
        return view('admin.daftar', compact('siswa', 'search'));
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
            'tanggal_lahir' => 'required|date',
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
            'tanggal_lahir' => $request->tanggal_lahir,
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
        $siswa = Siswa::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|string|in:L,P',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil semua input kecuali file `photo`
        $data = $request->all();

        // Proses upload foto baru (jika ada)
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($siswa->photo && file_exists(public_path($siswa->photo))) {
                unlink(public_path($siswa->photo));
            }

            // Simpan foto baru
            $photoName = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('upload'), $photoName);
            $data['photo'] = 'upload/' . $photoName;
        } else {
            // Jika tidak ada file baru, gunakan foto lama
            $data['photo'] = $siswa->photo;
        }

        // Update data siswa
        $siswa->update($data);

        return redirect()->route('admin.daftar')->with('success', 'Data siswa berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus file foto jika ada
        if ($siswa->photo && file_exists(public_path($siswa->photo))) {
            unlink(public_path($siswa->photo));
        }

        // Hapus data siswa dari database
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
