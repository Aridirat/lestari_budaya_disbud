@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col">
        <form action="{{ route('odcb.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_obyek" class="form-label">Nama Obyek</label>
                        <input type="text" name="nama_obyek" class="form-control" value="{{ $item->nama_obyek }}" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
                    </div>
            
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-control">
                            @foreach(['Benda', 'Bangunan', 'Struktur', 'Situs', 'Kawasan'] as $kategori)
                                <option value="{{ $kategori }}" {{ $item->kategori == $kategori ? 'selected' : '' }}>
                                    {{ $kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="lokasi_penemuan" class="form-label">Lokasi Penemuan</label>
                        <input type="text" name="lokasi_penemuan" class="form-control @error('lokasi_penemuan') is-invalid @enderror" value="{{ $item->lokasi_penemuan }}" required>
                        {{-- <select name="lokasi_penemuan" class="form-control">
                            @foreach(['Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Kelungkung', 'Karangasem', 'Buleleng', 'Bangli', 'Jembrana'] as $lokasi)
                                <option value="{{ $lokasi }}" {{ $item->lokasi_penemuan == $lokasi ? 'selected' : '' }}>
                                    {{ $lokasi }}
                                </option>
                            @endforeach
                        </select> --}}

                    </div>
            
                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control" value="{{ $item->nama_pemilik }}" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="alamat_pemilik" class="form-label">Alamat Pemilik</label>
                        <input type="text" name="alamat_pemilik" class="form-control" value="{{ $item->alamat_pemilik }}" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="status_pemilik" class="form-label">Status Pemilik</label>
                        <select name="status_pemilik" class="form-control">
                            <option value="Pribadi" {{ $item->status_pemilik == 'Pribadi' ? 'selected' : '' }}>Pribadi</option>
                            <option value="Pemerintah" {{ $item->status_pemilik == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Cover</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        @if($item->foto)
                            <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto) }}" width="100"></p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="foto_galeri" class="form-label">Foto Galeri</label>
                        <input type="file" name="foto_galeri" class="form-control" accept="image/*">
                        @if($item->foto_galeri)
                            <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto_galeri) }}" width="100"></p>
                        @endif
                    </div>
            
                    <div class="mb-3">
                        <label for="dokumen_kajian" class="form-label">Dokumen Kajian</label>
                        <input type="file" name="dokumen_kajian" class="form-control"  accept=".pdf">
                        @if($item->dokumen_kajian)
                            <p><a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
                        @endif
                    </div>
            
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('odcb.index') }}" class="btn btn btn-outline-danger mr-2">Batal</a>
                        <button type="submit" class="btn btn btn-primary">Simpan</button>
                    </div>
                   
                </div>
                
            </div>
           
        </form>
    </div>
</div>
@endsection
