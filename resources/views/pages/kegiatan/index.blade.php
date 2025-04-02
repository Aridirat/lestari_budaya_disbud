@extends('layouts.main')

{{-- @section('header')
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
@endsection --}}

@section('content')
@if (session('success'))
    <script>
      Swal.fire({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success"
      });
    </script>
@endif

@section('content')
<div class="row">
  <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            
            <!-- Form Search -->
            
            <form action="{{ route('kegiatan.index') }}" method="GET" class="form-inline">
                <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari Kegiatan..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-outline-warning mr-2"><i class="fas fa-search"></i></button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-primary btn-sm">Refresh</a>
            </form>
            <a href="/kegiatan/create" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus mr-2"></i>Tambah Kegiatan</a>
        </div>
          <div class="card-body">
            @if(request('search'))
                    <h5>Menampilkan hasil pencarian untuk: "{{ request('search') }}"</h5>
                @endif
              <table class="table text-center table-bordered table-striped table-hover">
                  <thead class="table-light">   
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Lokasi Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Dokumen Kajian</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($kegiatans as $kegiatan)
                      <tr>
                          <td>{{ ($kegiatans->currentPage() - 1) * $kegiatans->perPage() + $loop->index + 1 }}</td>
                          <td>{{ $kegiatan->judul_kegiatan }}</td>
                          <td>{{ $kegiatan->lokasi_kegiatan }}</td>
                          <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                          <td>
                            @if($kegiatan->dokumen_kajian)
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#dokumenModal{{ $kegiatan->id }}">
                                    Lihat Dokumen
                                </button>
                        
                                <!-- Modal Dokumen -->
                                <div class="modal fade" id="dokumenModal{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="dokumenLabel{{ $kegiatan->id }}" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Dokumen Kajian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                          <iframe src="{{ asset($kegiatan->dokumen_kajian) }}" width="100%" height="500px"></iframe>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @else
                                <span>Tidak ada dokumen</span>
                            @endif
                        </td>
                        
                        <td>
                            @if($kegiatan->gambar)
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#gambarModal{{ $kegiatan->id }}">
                                    Lihat Foto
                                </button>
                        
                                <!-- Modal Gambar -->
                                <div class="modal fade" id="gambarModal{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="gambarLabel{{ $kegiatan->id }}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Foto Kegiatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          <img src="{{ asset($kegiatan->gambar) }}" alt="Foto Kegiatan" class="img-fluid">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                          <div class="d-flex flex-column align-items-center">
                              <!-- Tombol Lihat Semua Data -->
                              <button type="button" class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#lihatModal{{ $kegiatan->id }}">
                                  <i class="fas fa-eye"></i>
                              </button>
                      
                              <!-- Modal Lihat Semua Data -->
                              <div class="modal fade" id="lihatModal{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatModalLabel{{ $kegiatan->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Detail Kegiatan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <table class="table table-bordered">
                                          <tr>
                                              <th>Judul Kegiatan</th>
                                              <td>{{ $kegiatan->judul_kegiatan }}</td>
                                          </tr>
                                          <tr>
                                              <th>Deskripsi</th>
                                              <td class="text-justify">{{ $kegiatan->deskripsi ?? '-' }}</td>
                                          </tr>
                                          <tr>
                                              <th>Lokasi Kegiatan</th>
                                              <td>{{ $kegiatan->lokasi_kegiatan }}</td>
                                          </tr>
                                          <tr>
                                              <th>Tanggal Kegiatan</th>
                                              <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                                          </tr>
                                          <tr>
                                              <th>Dokumen Kajian</th>
                                              <td>
                                                  @if($kegiatan->dokumen_kajian)
                                                      <iframe src="{{ asset($kegiatan->dokumen_kajian) }}" width="100%" height="400px"></iframe>
                                                      <br>
                                                      <a href="{{ asset($kegiatan->dokumen_kajian) }}" class="btn btn-sm btn-info mt-2" target="_blank">
                                                          Unduh Dokumen
                                                      </a>
                                                  @else
                                                      Tidak ada dokumen
                                                  @endif
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>Foto</th>
                                              <td class="text-center">
                                                  @if($kegiatan->gambar)
                                                      <img src="{{ asset($kegiatan->gambar) }}" alt="Foto Kegiatan" class="img-fluid" style="max-height: 300px;">
                                                  @else
                                                      Tidak ada gambar
                                                  @endif
                                              </td>
                                          </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                      
                              <!-- Tombol Edit -->
                              <a href="/kegiatan/edit/{{ $kegiatan->id }}" class="btn btn-sm btn-warning mb-1">
                                  <i class="fas fa-edit"></i>
                              </a>
                      
                              <!-- Tombol Hapus -->
                              <form action="{{ route('kegiatan.delete', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                          </div>
                      </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="8" class="text-center">Tidak ada data ditemukan</td>
                      </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
          <div class="card-footer d-flex justify-content-between">
              <span>Menampilkan {{ $kegiatans->count() }} dari total {{ $kegiatans->total() }} kegiatan</span>
              {{ $kegiatans->links('pagination::bootstrap-5') }}
          </div>
      </div>
  </div>
</div>
@endsection


