<?php

namespace Database\Seeders;

use App\Models\berita;
use App\Models\kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        berita::create([
            "judul_kegiatan" => "sosialisasi",
            "deskripsi" => "pengecekan cakra di sibang kaja",
            "lokasi_kegiatan" => "Badung",
            "tanggal_kegiatan" => "2025-04-15",
            "dokumen_kajian" => "kajian.pdf",
            "foto" => "sosialisasi.jpg",
        ]);
    }
}