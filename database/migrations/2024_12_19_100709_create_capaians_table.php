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
            $table->string('pernyataan');
            $table->enum('format_jawaban', ['format 1', 'format 2', 'deskripsi']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capaians');
    }
} 