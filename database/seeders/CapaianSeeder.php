<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capaian;

class CapaianSeeder extends Seeder
{
    public function run()
    {
        // Membuat 5 data Capaian menggunakan factory
        Capaian::factory()->count(5)->create();
    }
}