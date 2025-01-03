<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['name', 'nis', 'kelas', 'tanggal_lahir', 'gender', 'photo'];

    public function getUmurAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    public function rapor() {
        return $this->hasOne(Rapor::class, 'nis', 'nis');
    }
    public function raporTriwulan()
    {
        return $this->hasOne(Rapor::class, 'nis', 'nis')->where('periode', 'Triwulan');
    }
    public function raporAkhir()
    {
        return $this->hasOne(Rapor::class, 'nis', 'nis')->where('periode', 'Akhir');
    }
}
