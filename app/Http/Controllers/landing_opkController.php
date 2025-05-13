<?php

namespace App\Http\Controllers;

use App\Models\takbenda;
use Illuminate\Http\Request;

class landing_opkController extends Controller
{
    public function index(Request $request)
    {
        $query = takbenda::query();
    
        if ($request->has('search')) {
            $query->where('judul_opk', 'like', '%' . $request->search . '%');
        }

        $randomString = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, length: 30);
    
        $takbenda = $query->paginate(10);
    
        return view('pages.landing.create_opk', compact('takbenda', 'randomString'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_opk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat_tradisi' => 'required|string',
            'lokasi_tradisi' => 'required|string',
            'nama_narasumber' => 'required|string|max:255',
            'alamat_narasumber' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'kode_pos' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kunci_token' => 'required|string',
            'video' => [
                'required',
                'url',
                'regex:~^(https?://(www\.)?(youtube\.com/watch\?v=|youtu\.be/|drive\.google\.com/file/d/))[a-zA-Z0-9_-]+~'
            ],

            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('uploads', 'public');
        $dokumenPath = $request->file('dokumen_kajian') ? $request->file('dokumen_kajian')->store('uploads', 'public') : null;

        takbenda::create(array_merge($validated, [
            'foto' => $fotoPath,
            'dokumen_kajian' => $dokumenPath,
        ]));

        return redirect()->route('landing.kebudayaan')->with('success', 'Data berhasil ditambahkan!');
    }
}