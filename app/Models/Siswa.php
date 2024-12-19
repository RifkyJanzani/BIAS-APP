<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['name', 'nis', 'kelas', 'umur', 'gender', 'photo'];

    public function rapor() {
        return $this->hasOne(Rapor::class, 'nis', 'nis');
    }
}
