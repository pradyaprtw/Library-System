<div>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $item->judul_buku }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->kategori->nama_kategori }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Gambar Buku {{ $item->judul_buku }}" style="max-width: 100px;">
                    @else
                    <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
