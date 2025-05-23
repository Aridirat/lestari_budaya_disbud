<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benda extends Model
{
    use HasFactory;

    protected $table = 'benda'; 

    protected $fillable = [
        'kunci_token',
        'nama_obyek',
        'deskripsi',
        'kategori',
        'lokasi_penemuan',
        'nama_pemilik',
        'alamat_pemilik',
        'status_pemilik',
        'foto',
        'foto_galeri',
        'dokumen_kajian'
    ];
}