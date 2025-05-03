@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-12 text-center">
      <h1>Tambah Data ODCB</h1>
    </div>
    {{-- <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-primary">Beranda</a></li>
        <li class="breadcrumb-item active">ODCB</li>
      </ol>
    </div> --}}
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('odcb.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama Obyek</label>
                        <input type="text" name="nama_obyek" class="form-control @error('nama_obyek') is-invalid @enderror" required value="{{ old('nama_obyek') }}" placeholder="Masukkan nama obyek">
                        @error('nama_obyek')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Masukkan jdeskripsi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            @foreach (['Benda', 'Bangunan', 'Struktur', 'Situs', 'Kawasan'] as $kategori)
                                <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Penemuan</label>
                        <input type="text" name="lokasi_penemuan" class="form-control @error('lokasi_penemuan') is-invalid @enderror" required placeholder="Masukkan lokasi penemuan">
                        @error('lokasi_penemuan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" required value="{{ old('nama_pemilik') }}" placeholder="Masukkan nama pemilik">
                        @error('nama_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Pemilik</label>
                        <input type="text" name="alamat_pemilik" class="form-control @error('alamat_pemilik') is-invalid @enderror" required value="{{ old('alamat_pemilik') }}" placeholder="Masukkan alamat pemilik">
                        @error('alamat_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status Pemilik</label>
                        <select name="status_pemilik" class="form-control @error('status_pemilik') is-invalid @enderror" required>
                            <option value="">Pilih Status</option>
                            @foreach (['Pribadi', 'Pemerintah'] as $status)
                                <option value="{{ $status }}" {{ old('status_pemilik') == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status_pemilik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Foto Cover</label>
                        <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" accept="image/*" required>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Foto Galeri</label>
                        <input type="file" name="foto_galeri" class="form-control-file @error('foto_galeri') is-invalid @enderror" accept="image/*" required>
                        @error('foto_galeri')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Dokumen Kajian (Opsional)</label>
                        <input type="file" name="dokumen_kajian" class="form-control-file @error('dokumen_kajian') is-invalid @enderror" accept=".pdf">
                        @error('dokumen_kajian')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('odcb.index') }}" class="btn btn-outline-danger mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
