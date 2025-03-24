@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Benda</h2>
    <form action="{{ route('kegiatan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul_kegiatan">Judul Kegiatan</label>
            <input type="text" name="judul_kegiatan" class="form-control @error('judul_kegiatan') is-invalid @enderror" 
                required value="{{ old('judul_kegiatan', $item->judul_kegiatan ?? '') }}">
            @error('judul_kegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
            <select name="lokasi_kegiatan" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" required>
                <option value="">Pilih Lokasi</option>
                @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $lokasi)
                    <option value="{{ $lokasi }}" 
                        {{ old('lokasi_kegiatan', $item->lokasi_kegiatan ?? '') == $lokasi ? 'selected' : '' }}>
                        {{ $lokasi }}
                    </option>
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

        <div class="mb-3">
            <label for="dokumen_kajian" class="form-label">Dokumen Kajian</label>
            <input type="file" name="dokumen_kajian" class="form-control">
            @if($item->dokumen_kajian)
                <p><a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
