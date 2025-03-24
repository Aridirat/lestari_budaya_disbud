@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tambah Data Kegiatan</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">KEGIATAN</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul_kegiatan" class="form-control @error('judul_kegiatan') is-invalid @enderror" required value="{{ old('judul_kegiatan') }}">
                        @error('judul_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Kegiatan</label>
                        <select name="lokasi_kegiatan" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" required>
                            <option value="">Pilih Lokasi</option>
                            @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $lokasi)
                                <option value="{{ $lokasi }}" {{ old('lokasi_kegiatan') == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                            @endforeach
                        </select>
                        @error('lokasi_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" 
                            required value="{{ old('tanggal_kegiatan', $item->tanggal_kegiatan ?? '') }}">
                        
                        @error('tanggal_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
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
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
