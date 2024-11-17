<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function eraporPilihan($id)
    {
        // Ambil data siswa berdasarkan ID
        return view('guru.e-rapor-pilihan');
    }
} 
