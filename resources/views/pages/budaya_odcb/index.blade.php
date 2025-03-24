@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>ODCB</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">ODCB</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('odcb.create') }}" class="btn btn-sm btn-primary">
              Tambah Data ODCB
           </a>
            <form action="{{ route('odcb.index') }}" method="GET" class="d-flex">
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
                  <th>Nama Obyek</th>
                  <th>Deskripsi</th>
                  <th>Kategori</th>
                  <th>Lokasi Penemuan</th>
                  <th>Nama Pemilik</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Dokumen Kajian</th>
                  <th>Aksi</th> 
                </tr>
              </thead>
              <tbody>
                @foreach ($benda as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_obyek }}</td>
                  <td>{{ $item->deskripsi }}</td>
                  <td>{{ $item->kategori }}</td>
                  <td>{{ $item->lokasi_penemuan }}</td>
                  <td>{{ $item->nama_pemilik }}</td>
                  <td>{{ $item->alamat_pemilik }}</td>
                  <td>{{ $item->status_pemilik }}</td>
                  <td>
                    @if($item->foto)
                        <!-- Thumbnail Foto -->
                        <img src="{{ asset('storage/' . $item->foto) }}" width="100" class="img-thumbnail" 
                             data-bs-toggle="modal" data-bs-target="#modalFoto{{ $item->id }}" style="cursor: pointer;">
                
                        <!-- Modal untuk memperbesar gambar -->
                        <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Obyek</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" style="max-height: 80vh;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        Tidak Ada
                    @endif
                </td>
                
                  <td>
                      @if($item->dokumen_kajian)
                          <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat</a>
                      @else
                          Tidak Ada
                      @endif
                  </td>
                  <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('odcb.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('odcb.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
              {{ $benda->links('pagination::bootstrap-5') }}
           </div>
        </div>
      </div>
    </div>
@endsection
