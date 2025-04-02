<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateberitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->text('deskripsi');
            $table->enum('lokasi_kegiatan', [
                'Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 
                'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'
            ]);
            $table->date('tanggal_kegiatan');
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
        Schema::dropIfExists('berita');
    }
}