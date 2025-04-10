<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\takbenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OpkController extends Controller
{
    public function index(Request $request)
    {
        $query = takbenda::query();
    
        if ($request->has('search')) {
            $query->where('judul_opk', 'like', '%' . $request->search . '%');
        }
    
        $takbenda = $query->paginate(10);
    
        return view('pages.budaya_opk.index', compact('takbenda'));
    }

    public function create()
    {
        return view('pages.budaya_opk.create');
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

        return redirect()->route('opk.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = takbenda::findOrFail($id);
        return view('pages.budaya_opk.edit', compact('item'));
    }

    public function update(Request $request, $id)
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => [
                'required',
                'url',
                'regex:~^(https?://(www\.)?(youtube\.com/watch\?v=|youtu\.be/|drive\.google\.com/file/d/))[a-zA-Z0-9_-]+~'
            ],

            'dokumen_kajian' => 'nullable|mimes:pdf|max:2048',
        ]);

        $item = takbenda::findOrFail($id);

        $data = $validated;

        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        if ($request->hasFile('dokumen_kajian')) {
            if ($item->dokumen_kajian) {
                Storage::disk('public')->delete($item->dokumen_kajian);
            }
            $data['dokumen_kajian'] = $request->file('dokumen_kajian')->store('uploads', 'public');
        }

        $item->update($data);

        return redirect()->route('opk.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = takbenda::findOrFail($id);
    
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
    
        if ($item->dokumen_kajian) {
            Storage::disk('public')->delete($item->dokumen_kajian);
        }
    
        $item->delete();
    
        return redirect()->route('opk.index')->with('success', 'Data berhasil dihapus');
    }
}