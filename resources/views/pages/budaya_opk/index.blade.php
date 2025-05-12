@extends('layouts.main')



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

    {{-- Tabel Start --}}
  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="">
            <a href="{{ route('opk.create') }}" class="btn btn-sm bg-teal">
              Tambah Data OPK
                       </a>
          </div>
          <div class="flex space-x-2">
            <a href="{{ route('opk.pdf', ['search' => request('search'), 'tanggal' => request('tanggal')]) }}" target="_blank" class="btn btn-sm btn-danger">
              <i class="fas fa-file-pdf"></i> Cetak PDF
          </a>
            <form action="{{ route('opk.index') }}" method="GET" class="d-flex">
              <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari..." value="{{ request('search') }}">
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
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Foto Cover</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Foto Galeri</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Judul</th>
                
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Lokasi Tradisi</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Narasumber</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Alamat</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">No. HP</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Dokumen</th>
                  
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-teal-500 opacity-70">Aksi</th>
                  
                </tr>
              </thead>

              <tbody>
                @foreach ($takbenda as $item)
                <tr>
                  {{-- Foto Cover --}}
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="align-items-center text-center px-2 py-1">
                        
                        @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="inline-flex items-center justify-center text-sm text-white transition-all duration-200 ease-in-out w-30 rounded-xl border-2 border-solid" 
                          data-bs-toggle="modal" data-bs-target="#modalFoto{{ $item->id }}" style="cursor: pointer;">
                        <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Cover Tradisi</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body modal-body text-center d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" style="max-height: 80vh;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        Tidak Ada Foto
                    @endif
                    </div>
                  </td>
                  {{-- Foto Galeri --}}
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="align-items-center text-center px-2 py-1">
                        
                        @if($item->foto_galeri)
                        <img src="{{ asset('storage/' . $item->foto_galeri) }}" class="inline-flex items-center justify-center text-sm text-white transition-all duration-200 ease-in-out w-30 rounded-xl border-2 border-solid" 
                          data-bs-toggle="modal" data-bs-target="#modalFoto_galeri{{ $item->id }}" style="cursor: pointer;">
                        <div class="modal fade" id="modalFoto_galeri{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Galeri Tradisi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body modal-body text-center d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $item->foto_galeri) }}" class="img-fluid rounded" style="max-height: 80vh;">
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
                      <h6 class="mb-0 text-sm text-balance leading-normal dark:text-white">{{ $item->judul_opk }}</h6>
                    </div>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold text-balance leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->lokasi_tradisi }}</p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-0 text-sm text-balance leading-normal dark:text-white">{{ $item->nama_narasumber }}</h6>
                    </div>
                  </td>
                  <td class="p-2 text-left align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold text-balance leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->alamat_narasumber }}</span>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->no_hp }}</span>
                  </td>
                  
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">@if($item->dokumen_kajian)
                      <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank" class="btn btn-sm bg-teal"><i class="fas fa-solid fa-file pe-1"></i>Lihat</a>
                  @else
                      Tidak Ada
                  @endif</span>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="d-flex flex-column align-items-center">
                      <button class="btn btn-sm bg-cyan mb-1" data-toggle="modal" data-target="#lihatModal{{ $item->id }}">
                        <i class="fas fa-eye"></i>
                    </button>

                    <a href="{{ route('opk.edit', $item->id) }}" class="btn btn-sm bg-indigo mb-1">
                      <i class="fas fa-edit"></i>
                  </a>
                  {{-- <form action="{{ route('opk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm bg-red">
                          <i class="fas fa-trash"></i>
                      </button>
                  </form> --}}

                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                    <i class="fas fa-trash"></i>
                  </button>

                    <!-- Modal Detail -->
                      <div class="modal fade" id="lihatModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="lihatModalLabel{{ $item->id }}">Detail OPK</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body overflow-auto" style="max-height: 85vh;">
                              <table class="table table-bordered ">
                                  <tr>
                                      <th>Judul</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->judul_opk }}</td>
                                  </tr>
                                  
                                  <tr>
                                      <th>Alamat Tradisi</th>
                                      <td class="text-justify text-wrap text-break"> {{ $item->alamat_tradisi }}</td>
                                  </tr>
                                  <tr>
                                      <th>Lokasi Tradisi</th>
                                      <td class="text-justify text-wrap text-break"> {{ $item->lokasi_tradisi }}</td>
                                  </tr>
                                  <tr>
                                      <th>Nama Narasumber</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->nama_narasumber }}</td>
                                  </tr>
                                  <tr>
                                      <th>Alamat Narasumber</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->alamat_narasumber }}</td>
                                  </tr>
                                  <tr>
                                      <th>No HP</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->no_hp }}</td>
                                  </tr>
                                  <tr>
                                      <th>Kode Pos</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->kode_pos }}</td>
                                  </tr>
                                  <tr>
                                      <th>Kode Pos</th>
                                      <td class="text-justify text-wrap text-break">{{ $item->email }}</td>
                                  </tr>
                                  <tr>
                                      <th>Video</th>
                                      <td class="text-justify text-wrap text-break "><a class="text-decoration-none" href={{ $item->video }}>{{ $item->video }}</a></td>
                                  </tr>
                                  <tr>
                                      <th>Dokumen Kajian</th>
                                      <td>
                                          @if($item->dokumen_kajian)
                                              <iframe src="{{ asset('storage/' . $item->dokumen_kajian) }}" width="100%" height="400px"></iframe>
                                              <br>
                                              <a href="{{ asset('storage/' . $item->dokumen_kajian) }}" class="btn btn-sm btn-info mt-2" target="_blank">
                                                <i class="fas fa-download"></i> Unduh Dokumen
                                              </a>
                                          @else
                                              Tidak ada dokumen
                                          @endif
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Foto Cover</th>
                                      <td class="text-center d-flex justify-content-center align-items-center">
                                          @if($item->foto)
                                              <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Tradisi" class="img-fluid" style="max-height: 300px; max-width: 100%;">
                                          @else
                                              Tidak ada gambar
                                          @endif
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Foto Galeri</th>
                                      <td class="text-center d-flex justify-content-center align-items-center">
                                          @if($item->foto_galeri)
                                              <img src="{{ asset('storage/' . $item->foto_galeri) }}" alt="Foto Tradisi" class="img-fluid" style="max-height: 300px; max-width: 100%;">
                                          @else
                                              Tidak ada gambar
                                          @endif
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Deskripsi</th>
                                      <td class="text-justify text-wrap text-break ">{{ $item->deskripsi ?? '-' }}</td>
                                  </tr>
                              </table>
                              
                            </div>
                          </div>
                        </div>
                      </div>

                      
                  </div>
                  </td>
                </tr>
              @include('pages.budaya_opk.delete')




                @endforeach
              </tbody>

            </table>
          </div>
          <div class="d-flex p-3 bd-highlight align-items-center">
            <span>Menampilkan {{ $takbenda->count() }} dari total {{ $takbenda->total() }} OPK</span>
            <div class="ml-auto">
              {{ $takbenda->links('pagination::bootstrap-5') }}
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Tabel End --}}
  
@endsection
