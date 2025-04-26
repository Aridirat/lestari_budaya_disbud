<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\benda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OdcbController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('benda');
    
        if ($request->has('search')) {
            $query->where('nama_obyek', 'like', '%' . $request->search . '%');
        }
    
        $benda = $query->paginate(10); 
    
        return view('pages.budaya_odcb.index', compact('benda'));
    }

    public function create()
    {
        return view('pages.budaya_odcb.create');
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

        return redirect()->route('odcb.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = DB::table('benda')->where('id', $id)->first();
        return view('pages.budaya_odcb.edit', compact('item'));
    }
    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_obyek' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Benda,Bangunan,Struktur,Situs,Kawasan',
            'lokasi_penemuan' => 'required|string',
            'nama_pemilik' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'alamat_pemilik' => 'required|string',
            'status_pemilik' => 'required|in:Pribadi,Pemerintah',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'nama_obyek' => $validated['nama_obyek'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'lokasi_penemuan' => $validated['lokasi_penemuan'],
            'nama_pemilik' => $validated['nama_pemilik'],
            'alamat_pemilik' => $validated['alamat_pemilik'],
            'status_pemilik' => $validated['status_pemilik'],
            'updated_at' => now(),
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        if ($request->hasFile('dokumen_kajian')) {
            $data['dokumen_kajian'] = $request->file('dokumen_kajian')->store('uploads', 'public');
        }

        DB::table('benda')->where('id', $id)->update($data);

        return redirect()->route('odcb.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = DB::table('benda')->where('id', $id)->first();
    
        if (!$item) {
            return redirect()->route('odcb.index')->with('error', 'Data tidak ditemukan');
        }
    
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
    
        if ($item->dokumen_kajian) {
            Storage::disk('public')->delete($item->dokumen_kajian);
        }
    
        DB::table('benda')->where('id', $id)->delete();
    
        return redirect()->route('odcb.index')->with('success', 'Data berhasil dihapus');
    }
}