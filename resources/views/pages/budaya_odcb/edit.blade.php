@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Benda</h2>
    <form action="{{ route('odcb.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
            <input type="text" name="lokasi_penemuan" class="form-control @error('lokasi_penemuan') is-invalid @enderror" required>
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
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($item->foto)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto) }}" width="100"></p>
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
        <a href="{{ route('odcb.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
