<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaiansTable extends Migration
{
    public function up()
    {
        Schema::create('capaians', function (Blueprint $table) {
            $table->id();
            $table->string('pernyataan', 1000);
            $table->enum('kriteria', ['Nilai Agama dan Budi Pekerti', 'Jati Diri', 'Dasar Literasi dan STEAM']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capaians');
    }
}
