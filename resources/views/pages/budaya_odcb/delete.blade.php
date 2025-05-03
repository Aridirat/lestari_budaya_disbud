{{-- @extends('layouts.main')

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
@endsection --}}



<div class="modal fade" id="modal-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <form action="/budaya_odcb/{{ $item->id }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Hapus Data ODCB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-danger">Ya, hapus!</button>
                </div>
            </div>
        </form>
      
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>