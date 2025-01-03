<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Rapor;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($nis)
    {
        $siswa = Siswa::where('nis', $nis)->first();

        $rapor = Rapor::where('nis', $siswa->nis)->first();

        if (!$siswa || !$rapor) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pdf = PDF::loadView('guru.e-rapor.pdf_template', compact('siswa', 'rapor'))
                   ->setPaper('A4', 'portrait');

        return $pdf->download('rapor_' . $siswa->name . '.pdf');
    }
}
