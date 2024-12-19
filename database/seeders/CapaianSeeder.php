<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capaian;

class CapaianSeeder extends Seeder
{
    public function run()
    {
        // Seed some sample data for the Capaian table
        Capaian::create([
            'pernyataan' => 'Siswa menunjukkan perkembangan yang baik dalam motorik halus.',
        ]);

        Capaian::create([
            'pernyataan' => 'Siswa masih perlu bimbingan dalam motorik kasar.',
        ]);

        Capaian::create([
            'pernyataan' => 'Siswa aktif berpartisipasi dalam kegiatan kelas.',
        ]);

        Capaian::create([
            'pernyataan' => 'Siswa sudah menunjukkan kemajuan yang signifikan.',
        ]);
    }
}