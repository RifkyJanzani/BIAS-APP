<?php

namespace App\Imports;

use App\Models\Siswa; // Pastikan model Siswa ada
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        // Abaikan header (misalnya header pada baris pertama)
        if ($row[0] === 'NO') {
            return null;
        }

        return new Siswa([
            'nis'    => $row[1], // Kolom 'NOMOR_INDUK'
            'name'   => $row[3], // Kolom 'NAMA_SISWA'
            'kelas'  => $row[8], // Kolom 'KELAS'
            'umur'   => $row[6], // Kolom 'USIA'
            'gender' => $row[7], // Kolom 'JP' (asumsi jenis kelamin)
        ]);
    }
}