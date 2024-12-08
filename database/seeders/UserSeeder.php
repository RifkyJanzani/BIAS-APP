<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat user dengan role 'admin'
        User::create([
            'name' => 'Admin User',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Membuat user dengan role 'kepalaSekolah'
        User::create([
            'name' => 'Kepala Sekolah User',
            'role' => 'kepalaSekolah',
            'email' => 'kepala_sekolah@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Membuat user dengan role 'guru'
        User::create([
            'name' => 'Guru User',
            'role' => 'guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
