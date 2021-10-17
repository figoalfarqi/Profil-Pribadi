<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->integer('tahun_pengalaman');
            $table->string('pekerjaan_pengalaman');
            $table->string('tempat_pengalaman');
            $table->string('posisi_pengalaman');
            $table->string('deskripsi_pengalaman',500)->nullable();
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
        Schema::dropIfExists('pengalamans');
    }
}
