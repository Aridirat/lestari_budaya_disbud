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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan', 255);
            $table->text('deskripsi')->nullable()->default(null);
            $table->string('lokasi_kegiatan', 255)->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('dokumen_kajian', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
