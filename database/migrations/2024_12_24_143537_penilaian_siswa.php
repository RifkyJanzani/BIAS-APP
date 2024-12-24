<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Membuat tabel penilaian_siswas dengan foreign key
        Schema::create('penilaian_siswas', function (Blueprint $table) {
            $table->id();
            
            // Kolom 'nis' yang terhubung dengan tabel 'siswa'
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');

            // Kolom 'id_capaian' yang terhubung dengan tabel 'capaians'
            $table->unsignedBigInteger('id_capaian');
            $table->foreign('id_capaian')->references('id')->on('capaians')->onDelete('cascade');

            // Kolom bulan dan pekan
            $table->string('bulan');
            $table->string('pekan');

            // Kolom status
            $table->boolean('capaian')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel penilaian_siswas beserta constraint foreign key-nya
        Schema::dropIfExists('penilaian_siswas');
    }
};
