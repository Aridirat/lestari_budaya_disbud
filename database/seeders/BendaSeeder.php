<?php

namespace Database\Seeders;

use App\Models\benda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        benda::create([
            "nama_obyek" => "cakra",
            "kunci_token" => "atyuisoiuyasgayugygsauuijavxvxbqpwlj",
            "deskripsi" => "benda pusaka",
            "kategori" => "Benda",
            "lokasi_penemuan" => "Badung",
            "nama_pemilik" => "Ketut Ngangkan",
            "alamat_pemilik" => "Sibang Kaja",
            "status_pemilik" => "Pribadi",
            'foto' => 'ganesha.jpg',
            'dokumen_kajian' => 'kajian_ganesha.pdf',
        ]);
    }
}