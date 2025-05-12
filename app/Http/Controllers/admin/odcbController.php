<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\benda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class OdcbController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('benda');
    
        

        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('nama_obyek', 'like', "%$search%")
                  ->orWhere('kategori', 'like', "%$search%")
                  ->orWhere('nama_pemilik', 'like', "%$search%")
                  ->orWhere('alamat_pemilik', 'like', "%$search%")
                  ->orWhere('lokasi_penemuan', 'like', "%$search%")
                  ->orWhere('status_pemilik', 'like', "%$search%");
        }

        $allResults = $query->get();
        $benda = $query->latest()->paginate(10);

        return view('pages.budaya_odcb.index', [
            "benda" => $benda,
            "allResults" => $allResults,
            "search" => $request->input('search', '')
        ]);
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

            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'foto_galeri' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:5048',
            'kunci_token' => 'required|string',
        ], [
            "nama_obyek.required" => "Nama obyek harus diisi!",
            "nama_obyek.max" => "Maksimal 255 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "kategori.required" => "Kategori harus diisi!",
            "lokasi_penemuan.required" => "Lokasi penemuan harus diisi!",
            "nama_pemilik.required" => "Nama pemilik harus diisi!",
            "nama_pemilik.max" => "Nama pemilik maksimal 255 karakter!",
            "alamat_pemilik.required" => "Alamat pemilik harus diisi!",
            "status_pemilik.required" => "Status pemilik harus diisi!",
            "foto.required" => "Foto cover harus diisi!",
            "foto.mimes" => "Jenis foto cover harus jpeg, png, atau jpg!",
            "foto.max" => "Ukuran foto cover maksimal 5mb!",
            "foto_galeri.required" => "Foto galeri harus diisi!",
            "foto_galeri.mimes" => "Jenis foto galeri harus jpeg, png, atau jpg!",
            "foto_galeri.max" => "Ukuran foto galeri maksimal 5mb!",
           

            

        ]);

        // $fotoPath = $request->file('foto')->store('uploads', 'public');
        // $dokumenPath = $request->file('dokumen_kajian') ? $request->file('dokumen_kajian')->store('uploads', 'public') : null;



            // Simpan foto cover
            $foto = $request->file('foto'); 
            $fotoName = date('Y-m-d') . '_' . $foto->getClientOriginalName();
            $fotoPath = 'uploads/odcb/foto/' . $fotoName;
            Storage::disk('public')->put($fotoPath, file_get_contents($foto));

                // Simpan foto galeri
                $foto_galeri = $request->file('foto_galeri');
                $foto_galeriName = date('Y-m-d') . '_' . $foto_galeri->getClientOriginalName();
                $foto_galeriPath = 'uploads/odcb/foto_galeri/' . $foto_galeriName;
                Storage::disk('public')->put($foto_galeriPath, file_get_contents($foto_galeri));

            // Simpan dokumen (jika ada)
            $dokumenPath = null;
            if ($request->hasFile('dokumen_kajian')) {
                $dokumen = $request->file('dokumen_kajian');
                $dokumenName = date('Y-m-d') . '_' . $dokumen->getClientOriginalName();
                $dokumenPath = 'uploads/odcb/dokumen/' . $dokumenName;
                Storage::disk('public')->put($dokumenPath, file_get_contents($dokumen));
            }

            benda::create(array_merge($validated, [
                'foto' => $fotoPath,
                'foto_galeri' => $foto_galeriPath,
                'dokumen_kajian' => $dokumenPath,

            ]));

        

        DB::table('benda')->insert([
            
            'kunci_token' => $validated['kunci_token'],
            
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'foto_galeri' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'dokumen_kajian' => 'nullable|mimes:pdf|max:5048',
        ], [
            "nama_obyek.required" => "Nama obyek harus diisi!",
            "nama_obyek.max" => "Maksimal 255 karakter!",
            "deskripsi.required" => "Deskripsi harus diisi!",
            "kategori.required" => "Kategori harus diisi!",
            
            "lokasi_penemuan.required" => "Lokasi penemuan harus diisi!",
            "nama_pemilik.required" => "Nama pemilik harus diisi!",
            "nama_pemilik.max" => "Nama pemilik maksimal 255 karakter!",
            "alamat_pemilik.required" => "Alamat pemilik harus diisi!",
            "status_pemilik.required" => "Status pemilik harus diisi!",
            
            "foto.required" => "Foto cover harus diisi!",
            "foto.mimes" => "Jenis foto cover harus jpeg, png, atau jpg!",
            "foto.max" => "Ukuran foto cover maksimal 5mb!",
            "foto_galeri.required" => "Foto galeri harus diisi!",
            "foto_galeri.mimes" => "Jenis foto galeri harus jpeg, png, atau jpg!",
            "foto_galeri.max" => "Ukuran foto galeri maksimal 5mb!",
           
        ]);

        

        $item = benda::findOrFail($id);
        $data = $validated;
    
        // Update foto cover jika diunggah
        if ($request->hasFile('foto')) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $foto = $request->file('foto');
            $fotoName = date('Y-m-d') . '_' . $foto->getClientOriginalName();
            $fotoPath = 'uploads/odcb/foto/' . $fotoName;
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
            $foto_galeriPath = 'uploads/odcb/foto_galeri/' . $foto_galeriName;
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
            $dokumenPath = 'uploads/odcb/dokumen/' . $dokumenName;
            Storage::disk('public')->put($dokumenPath, file_get_contents($dokumen));
            $data['dokumen_kajian'] = $dokumenPath;
        }
    
        $item->update($data);

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

    public function exportPdf(Request $request)
{
    $query = DB::table('benda');

    if ($request->has('search') && $request->input('search') !== '') {
        $search = $request->input('search');
        $query->where('nama_obyek', 'like', "%$search%")
              ->orWhere('kategori', 'like', "%$search%")
              ->orWhere('nama_pemilik', 'like', "%$search%")
              ->orWhere('alamat_pemilik', 'like', "%$search%")
              ->orWhere('lokasi_penemuan', 'like', "%$search%")
              ->orWhere('status_pemilik', 'like', "%$search%");
    }

    $benda = $query->get();

    $pdf = PDF::loadView('pages.budaya_odcb.pdf', compact('benda'))->setPaper('a4', 'landscape');
    return $pdf->download('Data_ODCB.pdf');
}
}