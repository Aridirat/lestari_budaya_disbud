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
    
       

        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('judul_opk', 'like', "%$search%")
                  ->orWhere('nama_narasumber', 'like', "%$search%")
                  ->orWhere('no_hp', 'like', "%$search%")
                  ->orWhere('alamat_narasumber', 'like', "%$search%")
                  ->orWhere('lokasi_tradisi', 'like', "%$search%");
        }

        $allResults = $query->get();
        $takbenda = $query->latest()->paginate(10);

        return view('pages.budaya_opk.index', [
            "takbenda" => $takbenda,
            "allResults" => $allResults,
            "search" => $request->input('search', '')
        ]);
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
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'foto_galeri' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'video' => [
                'required',
                'url',
                'regex:~^(https?://(www\.)?(youtube\.com/watch\?v=|youtu\.be/|drive\.google\.com/file/d/))[a-zA-Z0-9_-]+~'
            ],

            'dokumen_kajian' => 'nullable|mimes:pdf|max:5048',
        ], [
            "judul_opk.required" => "Judul OPK harus diisi!",
            "judul_opk.max" => "Maksimal 255 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "alamat_tradisi.required" => "Alamat tradisi harus diisi!",
            "lokasi_tradisi.required" => "Lokasi tradisi harus diisi!",
            "nama_narasumber.required" => "Nama narasumber harus diisi!",
            "nama_narasumber.max" => "Nama narasumber maksimal 255 karakter!",
            "alamat_narasumber.required" => "Alamat narasumber harus diisi!",
            "alamat_narasumber.max" => "Alamat narasumber maksimal 255 karakter!",
            "no_hp.required" => "No HP harus diisi!",
            "no_hp.max" => "No HP maksimal 15 karakter!",
            "kode_pos.required" => "Kode pos harus diisi!",
            "kode_pos.max" => "Kode pos maksimal 10 karakter!",
            "email.required" => "Email harus diisi!",
            "email.max" => "Email maksimal 255 karakter!",
            "foto.required" => "Foto cover harus diisi!",
            "foto.mimes" => "Jenis foto cover harus jpeg, png, atau jpg!",
            "foto.max" => "Ukuran foto cover maksimal 5mb!",
            "foto_galeri.required" => "Foto galeri harus diisi!",
            "foto_galeri.mimes" => "Jenis foto galeri harus jpeg, png, atau jpg!",
            "foto_galeri.max" => "Ukuran foto galeri maksimal 5mb!",
            "video.required" => "Video harus diisi!",
            "dokumen_kajian.mimes" => "Jenis dokumen harus pdf!",
            "dokumen_kajian.max" => "Ukuran dokumen maksimal 5mb!",
            
        ]);

                // Simpan foto cover
            $foto = $request->file('foto');
            $fotoName = date('Y-m-d') . '_' . $foto->getClientOriginalName();
            $fotoPath = 'uploads/opk/foto/' . $fotoName;
            Storage::disk('public')->put($fotoPath, file_get_contents($foto));

                // Simpan foto galeri
            $foto_galeri = $request->file('foto_galeri');
            $foto_galeriName = date('Y-m-d') . '_' . $foto_galeri->getClientOriginalName();
            $foto_galeriPath = 'uploads/opk/foto_galeri/' . $foto_galeriName;
            Storage::disk('public')->put($foto_galeriPath, file_get_contents($foto_galeri));

            // Simpan dokumen (jika ada)
            $dokumenPath = null;
            if ($request->hasFile('dokumen_kajian')) {
                $dokumen = $request->file('dokumen_kajian');
                $dokumenName = date('Y-m-d') . '_' . $dokumen->getClientOriginalName();
                $dokumenPath = 'uploads/opk/dokumen/' . $dokumenName;
                Storage::disk('public')->put($dokumenPath, file_get_contents($dokumen));
            }

            takbenda::create(array_merge($validated, [
                'foto' => $fotoPath,
                'foto_galeri' => $foto_galeriPath,
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'foto_galeri' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'video' => [
                'required',
                'url',
                'regex:~^(https?://(www\.)?(youtube\.com/watch\?v=|youtu\.be/|drive\.google\.com/file/d/))[a-zA-Z0-9_-]+~'
            ],

            'dokumen_kajian' => 'nullable|mimes:pdf|max:5048',
        ], [
            "judul_opk.required" => "Judul OPK harus diisi!",
            "judul_opk.max" => "Maksimal 255 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "alamat_tradisi.required" => "Alamat tradisi harus diisi!",
            "lokasi_tradisi.required" => "Lokasi tradisi harus diisi!",
            "nama_narasumber.required" => "Nama narasumber harus diisi!",
            "nama_narasumber.max" => "Nama narasumber maksimal 255 karakter!",
            "alamat_narasumber.required" => "Alamat narasumber harus diisi!",
            "alamat_narasumber.max" => "Alamat narasumber maksimal 255 karakter!",
            "no_hp.required" => "No HP harus diisi!",
            "no_hp.max" => "No HP maksimal 15 karakter!",
            "kode_pos.required" => "Kode pos harus diisi!",
            "kode_pos.max" => "Kode pos maksimal 10 karakter!",
            "email.required" => "Email harus diisi!",
            "email.max" => "Email maksimal 255 karakter!",
            "foto.required" => "Foto cover harus diisi!",
            "foto.mimes" => "Jenis foto cover harus jpeg, png, atau jpg!",
            "foto.max" => "Ukuran foto cover maksimal 5mb!",
            "foto_galeri.required" => "Foto galeri harus diisi!",
            "foto_galeri.mimes" => "Jenis foto galeri harus jpeg, png, atau jpg!",
            "foto_galeri.max" => "Ukuran foto galeri maksimal 5mb!",
            "video.required" => "Video harus diisi!",
            "dokumen_kajian.mimes" => "Jenis dokumen harus pdf!",
            "dokumen_kajian.max" => "Ukuran dokumen maksimal 5mb!",
        ]);

        $item = takbenda::findOrFail($id);
        $data = $validated;
    
        // Update foto cover jika diunggah
        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $foto = $request->file('foto');
            $fotoName = date('Y-m-d') . '_' . $foto->getClientOriginalName();
            $fotoPath = 'uploads/opk/foto/' . $fotoName;
            Storage::disk('public')->put($fotoPath, file_get_contents($foto));
            $data['foto'] = $fotoPath;
        }

        // Update foto_galeri jika diunggah
        if ($request->hasFile('foto_galeri')) {
            if ($item->foto_galeri) {
                Storage::disk('public')->delete($item->foto_galeri);
            }
            $foto_galeri = $request->file('foto_galeri');
            $foto_galeriName = date('Y-m-d') . '_' . $foto_galeri->getClientOriginalName();
            $foto_galeriPath = 'uploads/opk/foto_galeri/' . $foto_galeriName;
            Storage::disk('public')->put($foto_galeriPath, file_get_contents($foto_galeri));
            $data['foto_galeri'] = $foto_galeriPath;
        }
    
        // Update dokumen jika diunggah
        if ($request->hasFile('dokumen_kajian')) {
            if ($item->dokumen_kajian) {
                Storage::disk('public')->delete($item->dokumen_kajian);
            }
            $dokumen = $request->file('dokumen_kajian');
            $dokumenName = date('Y-m-d') . '_' . $dokumen->getClientOriginalName();
            $dokumenPath = 'uploads/opk/dokumen/' . $dokumenName;
            Storage::disk('public')->put($dokumenPath, file_get_contents($dokumen));
            $data['dokumen_kajian'] = $dokumenPath;
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