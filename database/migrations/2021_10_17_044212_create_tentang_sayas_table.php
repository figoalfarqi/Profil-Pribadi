<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentangSayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentang_sayas', function (Blueprint $table) {
            $table->id('id_tentang_saya');
            $table->string('judul_tentang_saya');
            $table->string('deskripsi_tentang_saya');
            $table->string('image_tentang_saya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentang_sayas');
    }
}
