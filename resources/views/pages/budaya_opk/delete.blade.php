@foreach ($takbenda as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
            Hapus
        </button>

        <!-- Modal Konfirmasi Hapus -->
        <div class="modal fade" id="modal-delete-{{ $item->id }}">
            <div class="modal-dialog">
                <form action="{{ route('opk.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data OPK <strong>{{ $item->id }}</strong>?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </td>
</tr>
@endforeach
