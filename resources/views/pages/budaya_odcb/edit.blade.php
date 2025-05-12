@extends('layouts.main')

@section('content')
@if ($errors->any())
  <script>
    Swal.fire({
      title: "Terjadi Kesalahan",
      text: "@foreach($errors->all() as $error) {{ $error }} @endforeach",
      icon: "error"
    });
  </script>
@endif

<div class="row">
    <div class="col">
        <form action="{{ route('odcb.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_obyek" class="form-label">Nama Obyek</label>
                        <input type="text" name="nama_obyek" class="form-control @error('nama_obyek') is-invalid @enderror" value="{{ $item->nama_obyek }}" >
                        @error('nama_obyek')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $item->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                            @foreach(['Benda', 'Bangunan', 'Struktur', 'Situs', 'Kawasan'] as $kategori)
                                <option value="{{ $kategori }}" {{ $item->kategori == $kategori ? 'selected' : '' }}>
                                    {{ $kategori }}
                                </option>
                            @endforeach
                            @error('kategori')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="lokasi_penemuan" class="form-label">Lokasi Penemuan</label>
                        <input type="text" name="lokasi_penemuan" class="form-control @error('lokasi_penemuan') is-invalid @enderror" value="{{ $item->lokasi_penemuan }}" >
                        @error('lokasi_penemuan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                        <input type="text" name="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" value="{{ $item->nama_pemilik }}" >
                        @error('nama_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="alamat_pemilik" class="form-label">Alamat Pemilik</label>
                        <input type="text" name="alamat_pemilik" class="form-control @error('alamat_pemilik') is-invalid @enderror" value="{{ $item->alamat_pemilik }}" >
                        @error('alamat_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="status_pemilik" class="form-label">Status Pemilik</label>
                        <select name="status_pemilik" class="form-control @error('status_pemilik') is-invalid @enderror">
                            <option value="Pribadi" {{ $item->status_pemilik == 'Pribadi' ? 'selected' : '' }}>Pribadi</option>
                            <option value="Pemerintah" {{ $item->status_pemilik == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                        </select>
                        @error('status_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Cover</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @if($item->foto)
                            <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto) }}" width="100"></p>
                        @endif
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_galeri" class="form-label">Foto Galeri</label>
                        <input type="file" name="foto_galeri" class="form-control @error('foto_galeri') is-invalid @enderror" accept="image/*">
                        @if($item->foto_galeri)
                            <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto_galeri) }}" width="100"></p>
                        @endif
                        @error('foto_galeri')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="dokumen_kajian" class="form-label">Dokumen Kajian</label>
                        <input type="file" name="dokumen_kajian" class="form-control @error('dokumen_kajian') is-invalid @enderror"  accept=".pdf">
                        @if($item->dokumen_kajian)
                            <p><a class="text-decoration-none" href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
                        @endif
                        @error('dokumen_kajian')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
