<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benda', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_obyek');
            $table->string('kunci_token');
            $table->text('deskripsi');
            $table->enum('kategori', [
                'Benda', 'Bangunan', 'Struktur', 
                'Situs', 'Kawasan' 
            ]);
            $table->string('lokasi_penemuan');
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
            $table->enum('status_pemilik', [
                'Pribadi', 'Pemerintah'
            ]);
            $table->string('foto');
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
        Schema::dropIfExists('benda');
    }
}