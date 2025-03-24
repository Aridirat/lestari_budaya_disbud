<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $table = 'berita'; 

    protected $fillable = [
        'judul_kegiatan',
        'deskripsi',
        'lokasi_kegiatan', 
        'tanggal_kegiatan', 
        'dokumen_kajian',
    ];
}
