<?php

namespace Database\Seeders;

use App\Models\takbenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TakbendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        takbenda::create([
            'judul_opk' => 'Upacara Ngaben',
            'deskripsi' => 'Upacara pembakaran jenazah dalam tradisi Hindu Bali.',
            'alamat_tradisi' => 'Desa Ubud',
            'lokasi_tradisi' => 'Gianyar',
            'nama_narasumber' => 'Ida Bagus Putu',
            'alamat_narasumber' => 'Denpasar',
            'no_hp' => '081234567890',
            'kode_pos' => '80234',
            'email' => 'idabagusputu@example.com',
            'foto' => 'ngaben.jpg',
            'video' => 'https://youtu.be/example',
            'dokumen_kajian' => 'kajian_ngaben.pdf',
        ]);
    }
}
