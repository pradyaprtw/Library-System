<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('peminjaman.create') }}" class="btn btn-sm mb-3" style="background-color: #B03052; color: #FFF4B7">Tambah Peminjaman</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Buku</th>
                        <th>Nama Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $peminjamanItem)
                        <tr>
                            <td>{{ $peminjamanItem->buku->judul_buku }}</td>
                            <td>{{ $peminjamanItem->users->nama ?? 'Nama tidak tersedia'}}</td>
                            <td>{{ $peminjamanItem->tanggal_peminjaman }}</td>
                            <td>{{ $peminjamanItem->tanggal_pengembalian }}</td>
                            <td>{{ $peminjamanItem->denda }}</td>
                            <td>
                                @if($peminjamanItem->status == 'Menunggu Konfirmasi')
                                    <span wire:click="changeStatus({{ $peminjamanItem->id }})" class="btn badge bg-warning">Menunggu Konfirmasi</span>
                                @elseif($peminjamanItem->status == 'Dipinjam')
                                    <span class="badge bg-info">Dipinjam</span>
                                @elseif($peminjamanItem->status == 'Dikembalikan')
                                    <span class="badge bg-success">Dikembalikan</span>
                                @else
                                    <span class="badge bg-secondary">Status Tidak Diketahui</span>
                                @endif
                            </td>
                            <td>
                                
                                <button wire:click="delete({{ $peminjamanItem->id }})" class="btn badge bg-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

