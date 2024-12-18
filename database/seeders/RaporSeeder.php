<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rapors')->insert([
            [
                'nis' => '101232730143240002',
                'nama_siswa' => 'Adara Mysha Ashaputri',
                'kelas' => 'A ',
                'semester' => '1',
                'tahun_ajaran' => '2024/2025',
                'periode' => 'Triwulan',
                'nilai_agama_budi_pekerti' => 'Ananda menunjukkan perkembangan yang baik dalam memahami nilai-nilai agama dan budi pekerti. Mampu menerapkan sikap hormat, sopan santun, dan menunjukkan perilaku yang sesuai dengan ajaran agama dalam kehidupan sehari-hari.',
                'nilai_jati_diri' => 'Ananda menunjukkan perkembangan yang baik dalam pembentukan jati diri. Mampu mengekspresikan diri dengan percaya diri, menunjukkan kemandirian, dan memiliki kesadaran akan identitas dirinya sebagai individu yang unik.',
                'nilai_literasi_steam' => 'Ananda menunjukkan perkembangan yang baik dalam pemahaman dasar literasi dan STEAM. Mampu mengenal huruf, angka, dan konsep dasar sains. Menunjukkan ketertarikan dalam eksplorasi dan eksperimen sederhana.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '101232730143240002',
                'nama_siswa' => 'Adara Mysha Ashaputri',
                'kelas' => 'A ',
                'semester' => '1',
                'tahun_ajaran' => '2024/2025',
                'periode' => 'Akhir',
                'nilai_agama_budi_pekerti' => 'Ini Akhir Ananda menunjukkan perkembangan yang baik dalam memahami nilai-nilai agama dan budi pekerti. Mampu menerapkan sikap hormat, sopan santun, dan menunjukkan perilaku yang sesuai dengan ajaran agama dalam kehidupan sehari-hari.',
                'nilai_jati_diri' => 'Ini Akhir Ananda menunjukkan perkembangan yang baik dalam pembentukan jati diri. Mampu mengekspresikan diri dengan percaya diri, menunjukkan kemandirian, dan memiliki kesadaran akan identitas dirinya sebagai individu yang unik.',
                'nilai_literasi_steam' => 'Ini Akhir Ananda menunjukkan perkembangan yang baik dalam pemahaman dasar literasi dan STEAM. Mampu mengenal huruf, angka, dan konsep dasar sains. Menunjukkan ketertarikan dalam eksplorasi dan eksperimen sederhana.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ]);
    }
}
