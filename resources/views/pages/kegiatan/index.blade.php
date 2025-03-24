@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>KEGIATAN DINAS KEBUDAYAAN</h1>
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
      <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-primary">
              Tambah Data Kegiatan
           </a>
            <form action="{{ route('kegiatan.index') }}" method="GET" class="d-flex">
              <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari Nama Obyek..." value="{{ request('search') }}">
              <button type="submit" class="btn btn-sm btn-secondary">
                  <i class="fas fa-search"></i>
              </button>
           </form>
        </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Kegiatan</th>
                  <th>Deskripsi</th>
                  <th>Lokasi Kegiatan</th>
                  <th>Tanggal Kegiatan</th>
                  <th>Dokumen Kajian</th>
                  <th>Aksi</th> 
                </tr>
              </thead>
              <tbody>
                @foreach ($berita as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->judul_kegiatan }}</td>
                  <td>{{ $item->deskripsi }}</td>
                  <td>{{ $item->lokasi_kegiatan }}</td>
                  <td>{{ $item->tanggal_kegiatan }}</td>
                  <td>
                      @if($item->dokumen_kajian)
                          <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat</a>
                      @else
                          Tidak Ada
                      @endif
                  </td>
                  <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            <div class="card-footer">
              {{ $berita->links('pagination::bootstrap-5') }}
           </div>
        </div>
      </div>
    </div>
@endsection
