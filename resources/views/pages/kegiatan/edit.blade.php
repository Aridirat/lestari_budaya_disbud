@extends('layouts.main')

{{-- @section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Ubah Kegiatan</h1>
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
    <form action="/kegiatan/{{ $kegiatan->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
              <div class="form-group">
                  <label for="judul_kegiatan" class="form-label">Judul Kegiatan</label>
                  <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control @error('judul_kegiatan') is-invalid @enderror" value="{{ old('judul_kegiatan', $kegiatan->judul_kegiatan) }}">
                  @error('judul_kegiatan')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea 
                  name="deskripsi" 
                  id="deskripsi" 
                  cols="30" rows="5" 
                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                  @error('deskripsi')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
                  <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" value="{{ old('lokasi_kegiatan', $kegiatan->lokasi_kegiatan) }}">
                  @error('lokasi_kegiatan')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                  <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan) }}">
                  @error('tanggal_kegiatan')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="dokumen_kajian" class="form-label">Dokumen Kajian (PDF)</label>
                  @if($kegiatan->dokumen_kajian)
                      <p><a href="{{ asset($kegiatan->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
                  @endif
                  <input type="file" name="dokumen_kajian" class="form-control-file @error('dokumen_kajian') is-invalid @enderror" accept=".pdf,.doc,.docx">
                  @error('dokumen_kajian')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="gambar" class="form-label">Gambar Kegiatan</label>
                  @if($kegiatan->gambar)
                      <br>
                      <img src="{{ asset($kegiatan->gambar) }}" alt="Gambar Kegiatan" width="150" class="img-thumbnail">
                  @endif
                  <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror mt-2" accept="image/*">
                  @error('gambar')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>
          </div>

          <div class="card-footer">
              <div class="d-flex justify-content-end">
                  <a href="/kegiatan" class="btn btn-sm btn-outline-danger mr-2">Batal</a>
                  <button type="submit" class="btn btn-sm btn-warning">Simpan</button>
              </div>
          </div>
        </div>
    </form>
  </div>
</div>  
@endsection
