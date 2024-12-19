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
        $request->validate([
            'pernyataan' => 'required|string|max:255',
            'format_jawaban' => 'required|in:format 1,format 2,deskripsi',
        ]);
        Capaian::create($request->all());
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
            'format_jawaban' => 'required|in:format 1,format 2,deskripsi',
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