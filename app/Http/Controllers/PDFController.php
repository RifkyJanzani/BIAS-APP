<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($nis)
    {
        $siswa = Siswa::where('nis', $nis)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        $pdf = PDF::loadView('guru.e-rapor.pdf_template', compact('siswa'))
                   ->setPaper('A4', 'portrait');

        return $pdf->download('rapor_' . $siswa->name . '.pdf');
    }
}
