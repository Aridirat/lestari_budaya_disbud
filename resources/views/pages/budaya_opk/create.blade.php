@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tambah Data OPK</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-primary">Beranda</a></li>
        <li class="breadcrumb-item active">OPK</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('opk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul OPK</label>
                        <input type="text" name="judul_opk" class="form-control @error('judul_opk') is-invalid @enderror" required value="{{ old('judul_opk') }}">
                        @error('judul_opk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Tradisi</label>
                        <input type="text" name="alamat_tradisi" class="form-control @error('alamat_tradisi') is-invalid @enderror" required value="{{ old('alamat_tradisi') }}">
                        @error('alamat_tradisi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Tradisi/Pementasan</label>
                        <input type="text" class="form-control @error('lokasi_tradisi') is-invalid @enderror" name="lokasi_tradisi" required>
                        {{-- <select name="lokasi_tradisi" class="form-control @error('lokasi_tradisi') is-invalid @enderror" required>
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $alamat)
                                <option value="{{ $alamat }}" {{ old('lokasi_tradisi') == $alamat ? 'selected' : '' }}>{{ $alamat }}</option>
                            @endforeach
                        </select> --}}

                    <div class="form-group">
                        <label>Nama Narasumber</label>
                        <input type="text" name="nama_narasumber" class="form-control @error('nama_narasumber') is-invalid @enderror" required value="{{ old('nama_narasumber') }}">
                        @error('nama_narasumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Narasumber</label>
                        <input type="text" class="form-control @error('alamat_narasumber') is-invalid @enderror" name="alamat_narasumber" required>
                        {{-- <select name="alamat_narasumber" class="form-control @error('alamat_narasumber') is-invalid @enderror" required>
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $alamat)
                                <option value="{{ $alamat }}" {{ old('alamat_narasumber') == $alamat ? 'selected' : '' }}>{{ $alamat }}</option>
                            @endforeach
                        </select> --}}
                        @error('alamat_narasumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" required value="{{ old('kode_pos') }}">
                        @error('kode_pos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Kebudayaan</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" accept="image/*" required>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Video (YouTube / Google Drive)</label>
                        <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" 
                            placeholder="Masukkan link YouTube atau Google Drive" required value="{{ old('video') }}">
                        @error('video')
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
                        <a href="{{ route('opk.index') }}" class="btn btn-outline-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection