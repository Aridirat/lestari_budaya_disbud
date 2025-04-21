<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetakbendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takbenda', function (Blueprint $table) {
            $table->id(); 
            $table->string('judul_opk');
            $table->string('kunci_token');
            $table->text('deskripsi');
            $table->string('alamat_tradisi');
            $table->string('lokasi_tradisi');
            $table->string('nama_narasumber');
            $table->string('alamat_narasumber');
            $table->string('no_hp');
            $table->string('kode_pos');
            $table->string('email');
            $table->string('foto');
            $table->string('video'); 
            $table->string('dokumen_kajian')->nullable();
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
        Schema::dropIfExists('takbenda');
    }
}