<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index(Request $request) {
        $query = Kegiatan::query();

        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('judul_kegiatan', 'like', "%$search%")
                  ->orWhere('deskripsi', 'like', "%$search%")
                  ->orWhere('lokasi_kegiatan', 'like', "%$search%")
                  ->orWhere('tanggal_kegiatan', 'like', "%$search%");
        }

        if ($request->has('tanggal')) {
            $query->whereDate('tanggal_kegiatan', $request->input('tanggal'));
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
            "deskripsi" => "required|string",
            "lokasi_kegiatan" => "required",
            "tanggal_kegiatan" => "required|date",
            "dokumen_kajian" => "required|mimes:pdf|max:5048",
            "gambar" => "required|image|mimes:jpeg,png,jpg|max:5048",
        ], [
            "judul_kegiatan.required" => "Judul kegiatan harus diisi!",
            "judul_kegiatan.min" => "Minimal 3 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "lokasi_kegiatan.required" => "Lokasi kegiatan harus diisi!",
            "tanggal_kegiatan.required" => "Tanggal kegiatan harus diisi!",
            "dokumen_kajian.required" => "Dokumen kajian harus diisi!",
            "dokumen_kajian.mimes" => "Jenis dokumen harus pdf!",
            "dokumen_kajian.max" => "Ukuran dokumen maksimal 5mb!",
            "gambar.required" => "Foto harus diisi!",
            "gambar.mimes" => "Jenis foto harus jpeg, png, atau jpg!",
            "gambar.max" => "Ukuran foto maksimal 5mb!",
        ]);

        if ($request->hasFile('dokumen_kajian')) {
            // $docName = date('Y-m-d').$request->file('dokumen_kajian')->getClientOriginalName();
            // $request->file('dokumen_kajian')->move(public_path('uploads/kegiatan/dokumen'), $docName);
            // $validated['dokumen_kajian'] = 'uploads/kegiatan/dokumen/' . $docName;

            $dokumen = $request->file('dokumen_kajian');

             // Buat nama file unik (optional bisa pakai uniqid juga)
             $filename = date('Y-m-d') . '_' . $dokumen->getClientOriginalName();
             $path = 'uploads/kegiatan/dokumen_kajian/' . $filename;
         
             // Simpan ke disk 'public'
             Storage::disk('public')->put($path, file_get_contents($dokumen));
         
             // Simpan hanya nama filenya atau path relatif, sesuai kebutuhan
             $validated['dokumen_kajian'] = $filename; // atau $path kalau kamu mau simpan path lengkap
        }

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            
            // Buat nama file unik (optional bisa pakai uniqid juga)
            $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
            $path = 'uploads/kegiatan/gambar/' . $filename;
        
            // Simpan ke disk 'public'
            Storage::disk('public')->put($path, file_get_contents($photo));
        
            // Simpan hanya nama filenya atau path relatif, sesuai kebutuhan
            $validated['gambar'] = $filename; // atau $path kalau kamu mau simpan path lengkap
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
        "deskripsi" => "required|string",
        "lokasi_kegiatan" => "required",
        "tanggal_kegiatan" => "required|date",
        "dokumen_kajian" => "nullable|mimes:pdf|max:5048",
        "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:5048",
    ], [
        "judul_kegiatan.required" => "Judul kegiatan harus diisi!",
            "judul_kegiatan.min" => "Minimal 3 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "lokasi_kegiatan.required" => "Lokasi kegiatan harus diisi!",
            "tanggal_kegiatan.required" => "Tanggal kegiatan harus diisi!",
            "dokumen_kajian.required" => "Dokumen kajian harus diisi!",
            "dokumen_kajian.mimes" => "Jenis dokumen harus pdf!",
            "dokumen_kajian.max" => "Ukuran dokumen maksimal 5mb!",
            "gambar.required" => "Foto harus diisi!",
            "gambar.mimes" => "Jenis foto harus jpeg, png, atau jpg!",
            "gambar.max" => "Ukuran foto maksimal 5mb!",
    ]);

    $kegiatan = Kegiatan::findOrFail($id);

    // Handle dokumen_kajian
    if ($request->hasFile('dokumen_kajian')) {
        // Hapus file lama
        if ($kegiatan->dokumen_kajian && Storage::disk('public')->exists('uploads/kegiatan/dokumen_kajian/' . $kegiatan->dokumen_kajian)) {
            Storage::disk('public')->delete('uploads/kegiatan/dokumen_kajian/' . $kegiatan->dokumen_kajian);
        }

        $dokumen = $request->file('dokumen_kajian');
        $filename = date('Y-m-d') . '_' . $dokumen->getClientOriginalName();
        $path = 'uploads/kegiatan/dokumen_kajian/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($dokumen));
        $validated['dokumen_kajian'] = $filename;
    }

    // Handle gambar
    if ($request->hasFile('gambar')) {
        if ($kegiatan->gambar && Storage::disk('public')->exists('uploads/kegiatan/gambar/' . $kegiatan->gambar)) {
            Storage::disk('public')->delete('uploads/kegiatan/gambar/' . $kegiatan->gambar);
        }

        $gambar = $request->file('gambar');
        $imgName = date('Y-m-d') . '_' . $gambar->getClientOriginalName();
        $imgPath = 'uploads/kegiatan/gambar/' . $imgName;
        Storage::disk('public')->put($imgPath, file_get_contents($gambar));
        $validated['gambar'] = $imgName;
    }

    $kegiatan->update($validated);

    return redirect('/kegiatan')->with('success', 'Berhasil Mengubah Kegiatan');
}

   public function delete($id)
{
    $kegiatan = Kegiatan::findOrFail($id);

    if ($kegiatan->dokumen_kajian && Storage::disk('public')->exists('uploads/kegiatan/dokumen_kajian/' . $kegiatan->dokumen_kajian)) {
        Storage::disk('public')->delete('uploads/kegiatan/dokumen_kajian/' . $kegiatan->dokumen_kajian);
    }

    if ($kegiatan->gambar && Storage::disk('public')->exists('uploads/kegiatan/gambar/' . $kegiatan->gambar)) {
        Storage::disk('public')->delete('uploads/kegiatan/gambar/' . $kegiatan->gambar);
    }

    $kegiatan->delete();

    return redirect('/kegiatan')->with('success', 'Berhasil Menghapus Kegiatan');
}


}
