@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Data OPK</h2>
    <form action="{{ route('opk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_opk" class="form-label">Judul OPK</label>
            <input type="text" name="judul_opk" class="form-control" value="{{ $item->judul_opk }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_tradisi" class="form-label">Alamat Tradisi</label>
            <input type="text" name="alamat_tradisi" class="form-control" value="{{ old('alamat_tradisi', $item->alamat_tradisi) }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi Tradisi</label>
            <input type="text" class="form-control @error('lokasi_tradisi') is-invalid @enderror" name="lokasi_tradisi" required>
            {{-- <select name="lokasi_tradisi" class="form-control @error('lokasi_tradisi') is-invalid @enderror" required>
                <option value="">Pilih Kabupaten/Kota</option>
                @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $alamat)
                    <option value="{{ $alamat }}" {{ ($item->lokasi_tradisi == $alamat) ? 'selected' : '' }}>{{ $alamat }}</option>
                @endforeach
            </select> --}}
        </div>

        <div class="mb-3">
            <label for="nama_narasumber" class="form-label">Nama Narasumber</label>
            <input type="text" name="nama_narasumber" class="form-control" value="{{ $item->nama_narasumber }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_narasumber" class="form-label">Alamat Narasumber</label>
            <input type="text" class="form-control @error('alamat_narasumber') is-invalid @enderror" name="alamat_narasumber" required>
            {{-- <select name="alamat_narasumber" class="form-control">
                @foreach(['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $lokasi)
                    <option value="{{ $lokasi }}" {{ $item->alamat_narasumber == $lokasi ? 'selected' : '' }}>
                        {{ $lokasi }}
                    </option>
                @endforeach
            </select> --}}
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $item->no_hp }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_pos" class="form-label">Kode Pos</label>
            <input type="text" name="kode_pos" class="form-control" value="{{ $item->kode_pos }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $item->email }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Kebudayaan</label>
            <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($item->foto)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto) }}" width="100"></p>
            @endif
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video (Link YouTube/GDrive)</label>
            <input type="text" name="video" class="form-control" value="{{ $item->video }}" placeholder="Masukkan link video" required>
            @if($item->video)
                <p>Video saat ini: <a href="{{ $item->video }}" target="_blank">Lihat Video</a></p>
            @endif
        </div>

        <div class="mb-3">
            <label for="dokumen_kajian" class="form-label">Dokumen Kajian</label>
            <input type="file" name="dokumen_kajian" class="form-control">
            @if($item->dokumen_kajian)
                <p><a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('opk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection