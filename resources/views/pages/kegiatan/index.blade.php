@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>KEGIATAN</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-teal">Beranda</a></li>
        <li class="breadcrumb-item active">Kegiatan</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
  {{-- Tabel Start --}}
<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <div class="">
          <a href="{{ route('kegiatan.create') }}" class="btn btn-sm bg-teal">
            Tambah Data Kegiatan
          </a>
        </div>
        <div class="">
                    <form action="{{ route('kegiatan.index') }}" method="GET" class="d-flex">
                      <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari Nama Obyek..." value="{{ request('search') }}">
                      <button type="submit" class="btn btn-sm bg-teal">
                          <i class="fas fa-search"></i>
                      </button>
                    </form>
        </div>
      </div>
      <div class="flex-auto px-0 pt-3 pb-2">
        <div class="p-0 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">

            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Foto</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Judul Kegiatan</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Lokasi Kegiatan</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Tanggal</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Dokumen</th>

                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Aksi</th>
                
              </tr>
            </thead>

            <tbody>
              @foreach ($kegiatans as $kegiatan)
              <tr>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <div class="align-items-center text-center px-2 py-1">
                      
                      @if($kegiatan->gambar)
                      <img src="{{ asset($kegiatan->gambar) }}" class="inline-flex items-center justify-center text-sm text-white transition-all duration-200 ease-in-out w-30 rounded-xl border-2 border-solid" 
                        data-bs-toggle="modal" data-bs-target="#modalFoto{{ $kegiatan->id }}" style="cursor: pointer;">
                      <div class="modal fade" id="modalFoto{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $kegiatan->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="modalLabel{{ $kegiatan->id }}">Foto Tradisi</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body text-center d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <img src="{{ asset($kegiatan->gambar) }}" alt="Foto Kegiatan" class="img-fluid">
                                  </div>
                              </div>
                          </div>
                      </div>
                  @else
                      Tidak Ada Foto
                  @endif
                  
                  </div>
                </td>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <div class="flex flex-col justify-center">
                    <h6 class="mb-0 text-sm text-balance leading-normal dark:text-white">{{ $kegiatan->judul_kegiatan }}</h6>
                  </div>
                </td>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <p class="mb-0 text-xs font-semibold text-balance leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $kegiatan->lokasi_kegiatan }}</p>
                </td>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <p class="mb-0 text-xs font-semibold text-balance leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $kegiatan->tanggal_kegiatan }}</p>
                </td>              
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">@if($kegiatan->dokumen_kajian)
                    <a href="{{ asset('storage/' . $kegiatan->dokumen_kajian) }}" target="_blank" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#dokumenModal{{ $kegiatan->id }}"><i class="fas fa-solid fa-file pe-1"></i>Lihat</a>

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
                @endif</span>
                </td>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                  <div class="d-flex flex-column align-items-center">
                    <button class="btn btn-sm bg-cyan mb-1" data-toggle="modal" data-target="#lihatModal{{ $kegiatan->id }}">
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
                <td class="text-justify">{{ $kegiatan->judul_kegiatan }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td class="text-justify">{{ $kegiatan->deskripsi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Lokasi Kegiatan</th>
                <td class="text-justify">{{ $kegiatan->lokasi_kegiatan }}</td>
            </tr>
            <tr>
                <th>Tanggal Kegiatan</th>
                <td class="text-justify">{{ $kegiatan->tanggal_kegiatan }}</td>
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
                <td class="text-center d-flex justify-content-center align-items-center">
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

                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-sm bg-indigo mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('kegiatan.delete', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm bg-red">
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
      </div>
    </div>
  </div>
</div>
  {{-- Tabel End --}}
@endsection
