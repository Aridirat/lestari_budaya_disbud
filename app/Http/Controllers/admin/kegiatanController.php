<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('berita');
    
        if ($request->has('search')) {
            $query->where('judul_kegiatan', 'like', '%' . $request->search . '%');
        }
    
        $berita = $query->paginate(10); 
    
        return view('pages.kegiatan.index', compact('berita'));
    }

    public function create()
    {
        return view('pages.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi_kegiatan' => 'required|in:Badung,Bangli,Buleleng,Gianyar,Jembrana,Karangasem,Klungkung,Tabanan,Denpasar',
            'tanggal_kegiatan' => 'required|date',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
        ]);

        $dokumenPath = $request->file('dokumen_kajian') ? $request->file('dokumen_kajian')->store('uploads', 'public') : null;

        DB::table('berita')->insert([
            'judul_kegiatan' => $validated['judul_kegiatan'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi_kegiatan' => $validated['lokasi_kegiatan'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'dokumen_kajian' => $dokumenPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = DB::table('berita')->where('id', $id)->first();
        return view('pages.kegiatan.edit', compact('item'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi_kegiatan' => 'required|in:Badung,Bangli,Buleleng,Gianyar,Jembrana,Karangasem,Klungkung,Tabanan,Denpasar',
            'tanggal_kegiatan' => 'required|date',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'judul_kegiatan' => $validated['judul_kegiatan'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi_kegiatan' => $validated['lokasi_kegiatan'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'updated_at' => now(),
        ];

        if ($request->hasFile('dokumen_kajian')) {
            $data['dokumen_kajian'] = $request->file('dokumen_kajian')->store('uploads', 'public');
        }

        DB::table('berita')->where('id', $id)->update($data);

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = DB::table('berita')->where('id', $id)->first();
    
        if (!$item) {
            return redirect()->route('kegiatan.index')->with('error', 'Data tidak ditemukan');
        }
    
        if ($item->dokumen_kajian) {
            Storage::disk('public')->delete($item->dokumen_kajian);
        }
    
        DB::table('berita')->where('id', $id)->delete();
    
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus');
    }
}
