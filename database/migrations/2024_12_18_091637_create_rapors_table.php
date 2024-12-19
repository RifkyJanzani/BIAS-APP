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
        Schema::create('rapors', function (Blueprint $table) {
            $table->id('raporID');
            $table->string('nis');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->string('periode');
            $table->text('nilai_agama_budi_pekerti')->nullable();
            $table->text('nilai_jati_diri')->nullable();
            $table->text('nilai_literasi_steam')->nullable();
            $table->timestamps();

            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};
