<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class landing_odcbController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('benda');
    
        if ($request->has('search')) {
            $query->where('nama_obyek', 'like', '%' . $request->search . '%');
        }

        $randomString = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, length: 30);
    
        $benda = $query->paginate(10); 
    
        return view('pages.landing.create_odcb', compact('benda', 'randomString'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obyek' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Benda,Bangunan,Struktur,Situs,Kawasan',
            'lokasi_penemuan' => 'required|string',
            'nama_pemilik' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'alamat_pemilik' => 'required|string',
            'status_pemilik' => 'required|in:Pribadi,Pemerintah',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
            'kunci_token' => 'required|string',

        ]);

        $fotoPath = $request->file('foto')->store('uploads', 'public');
        $dokumenPath = $request->file('dokumen_kajian') ? $request->file('dokumen_kajian')->store('uploads', 'public') : null;

        DB::table('benda')->insert([
            'nama_obyek' => $validated['nama_obyek'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'lokasi_penemuan' => $validated['lokasi_penemuan'],
            'nama_pemilik' => $validated['nama_pemilik'],
            'alamat_pemilik' => $validated['alamat_pemilik'],
            'status_pemilik' => $validated['status_pemilik'],
            'kunci_token' => $validated['kunci_token'],
            'foto' => $fotoPath,
            'dokumen_kajian' => $dokumenPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('landing.kebudayaan')->with('success', 'Data berhasil ditambahkan!');
    }
}