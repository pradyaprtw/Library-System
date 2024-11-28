@foreach ($buku as $item)
    
<!-- Modal Peminjaman -->
<div class="modal fade" id="pinjamModal{{ $item->id }}" tabindex="-1" aria-labelledby="pinjamModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pinjamModalLabel{{ $item->id }}">Pinjam Buku - {{ $item->judul_buku }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buku.pinjam', $item->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_pengembalian{{ $item->tanggal_pengembalian }}">Tanggal Pengembalian? (maks 5 hari)</label>
                        <input type="date" class="form-control" id="tanggal_pengembalian{{ $item->id }}" name="tanggal_pengembalian" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach