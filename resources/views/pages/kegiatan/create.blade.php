@extends('layouts.main')

{{-- @section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tambah Kegiatan</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item active">Kegiatan</li>
      </ol>
    </div>
</div>
@endsection --}}

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
    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="judul_kegiatan" class="form-label">Judul Kegiatan</label>
                <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control @error('judul_kegiatan') is-invalid @enderror " value="{{ old('judul_kegiatan') }}" placeholder="Masukkan judul kegiatan">
                @error('judul_kegiatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
                <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" value="{{ old('lokasi_kegiatan') }}" placeholder="Lokasi">
                @error('lokasi_kegiatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan') }}">
                @error('tanggal_kegiatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea 
                name="deskripsi" X
                id="deskripsi" 
                cols="30" rows="5" 
                class="form-control @error('deskripsi') is-invalid @enderror"
                placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dokumen_kajian" class="form-label">Dokumen Kajian (Opsional)</label>
                <input type="file" name="dokumen_kajian" class="form-control-file @error('dokumen_kajian') is-invalid @enderror" accept=".pdf,.doc,.docx" >
                @error('dokumen_kajian')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group ">
                <label for="gambar" class="form-label">Foto Kegiatan</label>
                <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" accept="image/*"> 
                @error('gambar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-outline-danger mr-2">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection