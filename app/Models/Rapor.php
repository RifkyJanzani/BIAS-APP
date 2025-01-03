<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $table = 'rapors'; // Nama tabel
    protected $primaryKey = 'raporID'; // Primary key

    // Jika Anda ingin mengizinkan mass assignment
    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'semester',
        'tahun_ajaran',
        'periode',
        'nilai_agama_budi_pekerti',
        'nilai_jati_diri',
        'nilai_literasi_steam',
    ];
    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
