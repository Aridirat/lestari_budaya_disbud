@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Hapus Data Benda</h2>
    <p>Apakah Anda yakin ingin menghapus data ini?</p>

    <table class="table">
        <tr><th>Nama Obyek</th><td>{{ $benda->nama_obyek }}</td></tr>
        <tr><th>Kategori</th><td>{{ $benda->kategori }}</td></tr>
        <tr><th>Lokasi Penemuan</th><td>{{ $benda->lokasi_penemuan }}</td></tr>
        <tr><th>Nama Pemilik</th><td>{{ $benda->nama_pemilik }}</td></tr>
        <tr><th>Status Pemilik</th><td>{{ $benda->status_pemilik }}</td></tr>
    </table>

    <form action="{{ route('odcb.destroy', $benda->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('odcb.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
