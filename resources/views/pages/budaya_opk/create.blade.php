@extends('layouts.main')

@section('header')


<div class="row mb-2">
    <div class="col-sm-12 text-center">
      <h1>Tambah Data OPK</h1>
    </div>
    {{-- <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-primary">Beranda</a></li>
        <li class="breadcrumb-item active">ODCB</li>
      </ol>
    </div> --}}
</div>


{{-- <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tambah Data OPK</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-primary">Beranda</a></li>
        <li class="breadcrumb-item active">OPK</li>
      </ol>
    </div>
</div> --}}
@endsection

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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('opk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="kunci_token" value="token_admin" class="form-control @error('kunci_token') is-invalid @enderror" hidden>
                        @error('kunci_token')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Judul OPK</label>
                        <input type="text" name="judul_opk" class="form-control @error('judul_opk') is-invalid @enderror"  value="{{ old('judul_opk') }}" placeholder="Masukkan judul OPK">
                        @error('judul_opk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"  placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Tradisi</label>
                        <input type="text" name="alamat_tradisi" class="form-control @error('alamat_tradisi') is-invalid @enderror"  value="{{ old('alamat_tradisi') }}" placeholder="Masukkan alamat tradisi">
                        @error('alamat_tradisi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Tradisi/Pementasan</label>
                        <input type="text" class="form-control @error('lokasi_tradisi') is-invalid @enderror" name="lokasi_tradisi"  placeholder="Masukkan lokasi tradisi">
                        {{-- <select name="lokasi_tradisi" class="form-control @error('lokasi_tradisi') is-invalid @enderror" required>
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $alamat)
                                <option value="{{ $alamat }}" {{ old('lokasi_tradisi') == $alamat ? 'selected' : '' }}>{{ $alamat }}</option>
                            @endforeach
                        </select> --}}
                        @error('lokasi_tradisi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>  

                    <div class="form-group">
                        <label>Nama Narasumber</label>
                        <input type="text" name="nama_narasumber" class="form-control @error('nama_narasumber') is-invalid @enderror"  value="{{ old('nama_narasumber') }}" placeholder="Masukkan nama narasumber">
                        @error('nama_narasumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Narasumber</label>
                        <input type="text" class="form-control @error('alamat_narasumber') is-invalid @enderror" name="alamat_narasumber"  placeholder="Masukkan alamat narasumber">
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
                        <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"  value="{{ old('no_hp') }}" placeholder="Masukkan no hp">
                        @error('no_hp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror"  value="{{ old('kode_pos') }}" placeholder="Masukkan kode pos">
                        @error('kode_pos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Masukkan email">
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
                        <label>Foto Cover</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" >
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto Galeri</label>
                        <input type="file" name="foto_galeri" class="form-control @error('foto_galeri') is-invalid @enderror" accept="image/*" >
                        @error('foto_galeri')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Video (YouTube / Google Drive)</label>
                        <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" 
                            placeholder="Masukkan link YouTube atau Google Drive"  value="{{ old('video') }}" >
                        @error('video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Dokumen Kajian (Opsional)</label>
                        <input type="file" name="dokumen_kajian" class="form-control @error('dokumen_kajian') is-invalid @enderror" accept=".pdf">
                        @error('dokumen_kajian')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('opk.index') }}" class="btn btn-outline-danger mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection