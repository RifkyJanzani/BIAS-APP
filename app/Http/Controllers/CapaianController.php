<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Capaian;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    public function index()
    {
        $capaian = Capaian::all();
        return view('admin.capaian.index', compact('capaian'));
    }

    public function create()
    {
        return view('admin.capaian.create');
    }

    public function store(Request $request)
    {
        // Validasi
        // dd($request->all());
        // $request->validate([
        //     'pernyataan' => 'required_without:pernyataan_multi|string|max:255',
        //     'pernyataan_multi' => 'required_without:pernyataan|string',
        // ]);

        if (!empty(trim($request->pernyataan_multi))) {
            // Mengolah input banyak pernyataan
            $array_pernyataan = preg_split("/\r\n|\n/", $request->pernyataan_multi);
            $array_pernyataan = array_filter($array_pernyataan, fn($value) => !is_null($value) && trim($value) !== '');
            $array_pernyataan = array_values($array_pernyataan);

            foreach ($array_pernyataan as $pernyataan) {
                Capaian::create([
                    'pernyataan' => $pernyataan,
                    'kriteria' => $request->kriteria,
                ]);
            }
        } else {
            // Mengolah input satu pernyataan
            foreach ($request->pernyataan as $pernyataan) {
                Capaian::create([
                    'pernyataan' => $pernyataan,
                    'kriteria' => $request->kriteria,
                ]);
            }
        }

        // Redirect setelah berhasil menyimpan
        return redirect()->route('admin.capaian.index')->with('success', 'Capaian berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $capaian = Capaian::findOrFail($id);
        return view('admin.capaian.edit', compact('capaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pernyataan' => 'required|string|max:255',
            // 'format_jawaban' => 'required|in:format 1,format 2,deskripsi',
        ]);
        $capaian = Capaian::findOrFail($id);
        $capaian->update($request->all());
        return redirect()->route('admin.capaian.index')->with('success', 'Capaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $capaian = Capaian::findOrFail($id);
        $capaian->delete();
        return redirect()->route('admin.capaian.index')->with('success', 'Capaian berhasil dihapus.');
    }
}
