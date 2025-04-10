<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        Kegiatan::create([
            "judul_kegiatan" => "sosialisasi",
            "deskripsi" => "pengecekan cakra di sibang kaja",
            "lokasi_kegiatan" => "Badung",
            "tanggal_kegiatan" => "2025-04-15",
            "dokumen_kajian" => "kajian.pdf",
            "gambar" => "sosialisasi.jpg",
        ]);
        Kegiatan::create([
            "judul_kegiatan" => "sosialisasi",
            "deskripsi" => "pengecekan cakra di sibang kaja",
            "lokasi_kegiatan" => "Badung",
            "tanggal_kegiatan" => "2025-04-15",
            "dokumen_kajian" => "kajian.pdf",
            "gambar" => "sosialisasi.jpg",
        ]);
    }
}