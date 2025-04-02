@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>OPK</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">OPK</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('opk.create') }}" class="btn btn-sm btn-primary">
              Tambah Data OPK
           </a>
            <form action="{{ route('opk.index') }}" method="GET" class="d-flex">
              <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari Nama Obyek..." value="{{ request('search') }}">
              <button type="submit" class="btn btn-sm btn-secondary">
                  <i class="fas fa-search"></i>
              </button>
           </form>
        </div>
          <div class="card-body">
            <table class="table table-bordered table-hover text-center align-middle ">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Lokasi Tradisi</th>
                  <th>Nama Narasumber</th>
                  <th>Alamat Narasumber</th>
                  <th>No HP</th>
                  <th>Foto</th>
                  <th>Video</th>
                  <th>Dokumen Kajian</th>  
                  <th>Aksi</th> 
                </tr>
              </thead>
              <tbody>
                @foreach ($takbenda as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->judul_opk }}</td>
                  <td>{{ $item->deskripsi }}</td>
                  <td>{{ $item->lokasi_tradisi }}</td>
                  <td>{{ $item->nama_narasumber }}</td>
                  <td>{{ $item->alamat_narasumber }}</td>
                  <td>{{ $item->no_hp }}</td>
                  <td>
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" width="100" class="img-thumbnail" 
                             data-bs-toggle="modal" data-bs-target="#modalFoto{{ $item->id }}" style="cursor: pointer;">
                        <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Tradisi</h5>
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
                <td>{{ $item->video }}</td>
                  <td>
                      @if($item->dokumen_kajian)
                          <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat</a>
                      @else
                          Tidak Ada
                      @endif
                  </td>
                  <td>
                    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-sm btn-info mb-1" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a href="{{ route('opk.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('opk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
                </tr>

                <!-- Modal Detail -->
                <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $item->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modalDetailLabel{{ $item->id }}">Detail OPK</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p><strong>Judul:</strong> {{ $item->judul_opk }}</p>
                            <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>
                            <p><strong>Alamat Tradisi:</strong> {{ $item->alamat_tradisi }}</p>
                            <p><strong>Lokasi Tradisi:</strong> {{ $item->lokasi_tradisi }}</p>
                            <p><strong>Nama Narasumber:</strong> {{ $item->nama_narasumber }}</p>
                            <p><strong>Alamat Narasumber:</strong> {{ $item->alamat_narasumber }}</p>
                            <p><strong>No HP:</strong> {{ $item->no_hp }}</p>
                            <p><strong>Kode Pos:</strong> {{ $item->kode_pos }}</p>
                            <p><strong>Email:</strong> {{ $item->email }}</p>
                        
                            <!-- Menampilkan Foto -->
                            <p><strong>Foto:</strong></p>
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                            @else
                                <p>Tidak Ada Foto</p>
                            @endif
                            <p><strong>Video:</strong>{{ $item->video }}</p>
                            <!-- Menampilkan Dokumen (jika ada) -->
                            <p><strong>Dokumen:</strong></p>
                            @if($item->dokumen_kajian)
                                <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" class="btn btn-sm btn-primary" target="_blank">
                                    <i class="fas fa-download"></i> Unduh Dokumen
                                </a>
                            @else
                                <p>Tidak Ada Dokumen</p>
                            @endif
                        </div>
                        
                      </div>
                  </div>
                </div>

                @endforeach
              </tbody>
          </table>
        </div>
          <div class="card-footer">
            {{ $takbenda->links('pagination::bootstrap-5') }}
         </div>
      </div>
    </div>
  </div>
@endsection
