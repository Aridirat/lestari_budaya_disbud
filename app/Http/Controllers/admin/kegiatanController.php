<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index(Request $request) {
            $query = Kegiatan::query();

        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('judul_kegiatan', 'like', "%$search%")
                  ->orWhere('deskripsi', 'like', "%$search%")
                  ->orWhere('lokasi_kegiatan', 'like', "%$search%");
        }

        $allResults = $query->get();
        $kegiatans = $query->latest()->paginate(10);

        return view('pages.kegiatan.index', [
            "kegiatans" => $kegiatans,
            "allResults" => $allResults,
            "search" => $request->input('search', '')
        ]);
    }

    public function create() {
        return view('pages.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "judul_kegiatan" => "required|min:3",
            "deskripsi" => "nullable",
            "lokasi_kegiatan" => "required",
            "tanggal_kegiatan" => "required|date",
            "dokumen_kajian" => "nullable|mimes:pdf,doc,docx|max:2048",
            "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        if ($request->hasFile('dokumen_kajian')) {
            $docName = $request->file('dokumen_kajian')->getClientOriginalName();
            $request->file('dokumen_kajian')->move(public_path('uploads/kegiatan/dokumen'), $docName);
            $validated['dokumen_kajian'] = 'uploads/kegiatan/dokumen/' . $docName;
        }

        if ($request->hasFile('gambar')) {
            $imageName = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/kegiatan'), $imageName);
            $validated['gambar'] = 'uploads/kegiatan/' . $imageName;
        }

        Kegiatan::create($validated);

        return redirect('/kegiatan')->with('success', 'Berhasil Menambahkan Kegiatan');
    }

    public function edit($id) {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('pages.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "judul_kegiatan" => "required|min:3",
            "deskripsi" => "nullable",
            "lokasi_kegiatan" => "required",
            "tanggal_kegiatan" => "required|date",
            "dokumen_kajian" => "nullable|mimes:pdf,doc,docx|max:2048",
            "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);
    
        $kegiatan = Kegiatan::findOrFail($id);

        if ($request->hasFile('dokumen_kajian')) {
            if ($kegiatan->dokumen_kajian && file_exists(public_path($kegiatan->dokumen_kajian))) {
                unlink(public_path($kegiatan->dokumen_kajian));
            }
            $docName = $request->file('dokumen_kajian')->getClientOriginalName();
            $request->file('dokumen_kajian')->move(public_path('uploads/kegiatan/dokumen'), $docName);
            $validated['dokumen_kajian'] = 'uploads/kegiatan/dokumen/' . $docName;
        }
    
        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar && file_exists(public_path($kegiatan->gambar))) {
                unlink(public_path($kegiatan->gambar));
            }
            $imageName = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/kegiatan'), $imageName);
            $validated['gambar'] = 'uploads/kegiatan/' . $imageName;
        }

        $kegiatan->update($validated);

        return redirect('/kegiatan')->with('success', 'Berhasil Mengubah Kegiatan');
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->dokumen_kajian && file_exists(public_path($kegiatan->dokumen_kajian))) {
            unlink(public_path($kegiatan->dokumen_kajian));
        }

        if ($kegiatan->gambar && file_exists(public_path($kegiatan->gambar))) {
            unlink(public_path($kegiatan->gambar));
        }

        $kegiatan->delete();

        return redirect('/kegiatan')->with('success', 'Berhasil Menghapus Kegiatan');
    }
}
