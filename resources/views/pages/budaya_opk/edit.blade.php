@extends('layouts.main')

@section('content')
@if ($errors->any())
  <script>
    Swal.fire({
      title: "Terjadi Kesalahan",
      text: "@foreach($errors->all() as $error) {{ $error }} @endforeach",
      icon: "error"
    });
  </script>
@endif

<div class="row">
    <div class="col">
    <form action="{{ route('opk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="judul_opk" class="form-label">Judul OPK</label>
                    <input type="text" name="judul_opk" class="form-control @error('judul_opk') is-invalid @enderror"  value="{{ old('judul_opk', $item->judul_opk) }}" placeholder="Masukkan judul OPK" >
                    @error('judul_opk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"  placeholder="Masukkan deskripsi">{{old('deskripsi', $item->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="alamat_tradisi" class="form-label">Alamat Tradisi</label>
                    <input type="text" name="alamat_tradisi" class="form-control @error('alamat_tradisi') is-invalid @enderror"  value="{{ old('alamat_tradisi', $item->alamat_tradisi) }}" placeholder="Masukkan alamat tradisi" >
                    @error('alamat_tradisi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label>Lokasi Tradisi</label>
                    <input type="text" class="form-control @error('lokasi_tradisi') is-invalid @enderror" value="{{ old('lokasi_tradisi', $item->lokasi_tradisi) }}" name="lokasi_tradisi"  placeholder="Masukkan lokasi tradisi" >
                    {{-- <select name="lokasi_tradisi" class="form-control @error('lokasi_tradisi') is-invalid @enderror" required>
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach (['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $alamat)
                            <option value="{{ $alamat }}" {{ ($item->lokasi_tradisi == $alamat) ? 'selected' : '' }}>{{ $alamat }}</option>
                        @endforeach
                    </select> --}}
                    @error('lokasi_tradisi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="nama_narasumber" class="form-label">Nama Narasumber</label>
                    <input type="text" name="nama_narasumber" class="form-control @error('nama_narasumber') is-invalid @enderror"  value="{{ old('nama_narasumber',  $item->nama_narasumber) }}" placeholder="Masukkan nama narasumber" >
                    @error('nama_narasumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="alamat_narasumber" class="form-label">Alamat Narasumber</label>
                    <input type="text" class="form-control @error('alamat_narasumber') is-invalid @enderror" value="{{ old('alamat_narasumber', $item->alamat_narasumber) }}" name="alamat_narasumber"  placeholder="Masukkan alamat narasumber" >
                    {{-- <select name="alamat_narasumber" class="form-control">
                        @foreach(['Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan', 'Denpasar'] as $lokasi)
                            <option value="{{ $lokasi }}" {{ $item->alamat_narasumber == $lokasi ? 'selected' : '' }}>
                                {{ $lokasi }}
                            </option>
                        @endforeach
                    </select> --}}
                    @error('alamat_narasumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"  value="{{ old('no_hp',  $item->no_hp) }}" placeholder="Masukkan no hp" >
                    @error('no_hp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror"  value="{{ old('kode_pos',  $item->kode_pos) }}" placeholder="Masukkan kode pos">
                    @error('kode_pos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email',  $item->email) }}" placeholder="Masukkan email" >
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                {{-- Foto Cover --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Cover</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" >
                    @if($item->foto)
                        <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto) }}" width="100"></p>
                    @endif

                    @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    {{-- @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="inline-flex items-center justify-center text-sm text-white transition-all duration-200 ease-in-out w-30 rounded-xl border-2 border-solid" 
                          data-bs-toggle="modal" data-bs-target="#modalFoto{{ $item->id }}" style="cursor: pointer;">
                        <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Tradisi</h5>
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
                    @endif --}}
                </div>

                {{-- Foto Galeri --}}
                <div class="mb-3">
                    <label for="foto_galeri" class="form-label">Foto Galeri</label>
                    <input type="file" name="foto_galeri" class="form-control @error('foto_galeri') is-invalid @enderror"  accept="image/*">
                    @if($item->foto_galeri)
                        <p>Foto saat ini: <img src="{{ asset('storage/' . $item->foto_galeri) }}" width="100"></p>
                    @endif

                    @error('foto_galeri')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="inline-flex items-center justify-center text-sm text-white transition-all duration-200 ease-in-out w-30 rounded-xl border-2 border-solid" 
                          data-bs-toggle="modal" data-bs-target="#modalFoto{{ $item->id }}" style="cursor: pointer;">
                        <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">Foto Tradisi</h5>
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
                    @endif --}}
                </div>
        
                <div class="mb-3">
                    <label for="video" class="form-label">Video (Link YouTube/GDrive)</label>
                    <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" 
                    placeholder="Masukkan link YouTube atau Google Drive"  value="{{ old('video',  $item->video) }}" >
                    @if($item->video)
                        <p>Video saat ini: <a href="{{ $item->video }}" target="_blank">Lihat Video</a></p>
                    @endif

                    @error('video')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="dokumen_kajian" class="form-label">Dokumen Kajian</label>
                    <input type="file" name="dokumen_kajian" class="form-control @error('dokumen_kajian') is-invalid @enderror" accept=".pdf">
                    @if($item->dokumen_kajian)
                        <p><a href="{{ asset('storage/' . $item->dokumen_kajian) }}" target="_blank">Lihat Dokumen</a></p>
                    @endif

                    @error('dokumen_kajian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('opk.index') }}" class="btn btn btn-outline-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn btn-primary">Simpan</button>
    
                </div>
            </div>
            
        </div>
        
        
    </form>
    </div>
</div>
@endsection