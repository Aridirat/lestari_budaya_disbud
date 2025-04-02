<div class="modal fade" id="modal-delete-{{ $kegiatans->id }}">
    <div class="modal-dialog">
        <form action="/kegiatan/{{ $kegiatans->id }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Hapus Kegiatan</h4>
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