<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class takbenda extends Model
{
    use HasFactory;
    protected $table = 'takbenda'; 

    protected $fillable = [
        'judul_opk',
        'deskripsi',
        'alamat_tradisi',
        'lokasi_tradisi',
        'nama_narasumber',
        'alamat_narasumber',
        'no_hp',
        'kode_pos',
        'email',
        'foto',
        'video',
        'dokumen_kajian'
    ];
}
