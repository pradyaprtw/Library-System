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

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    <div class="card">
            <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <span wire:click="changeStatus({{ $peminjamanItem->id }})" class="btn text text-warning">Menunggu Konfirmasi</span>
                                @elseif($peminjamanItem->status == 'Dipinjam')
                                    <span class="text text-info">Dipinjam</span>
                                @elseif($peminjamanItem->status == 'Dikembalikan')
                                    <span class="text text-success">Dikembalikan</span>
                                @else
                                    <span class="text text-secondary">Status Tidak Diketahui</span>
                                @endif
                            </td>
                            <td>
                                
                                <button wire:click="delete({{ $peminjamanItem->id }})" class="btn btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

