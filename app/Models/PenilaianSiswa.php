<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianSiswa extends Model
{
    //
    use HasFactory;
    protected $fillable = ['nis', 'id_capaian', 'bulan', 'pekan', 'capaian'];
        
}
