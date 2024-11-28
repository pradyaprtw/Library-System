<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Judul Buku</th>
                <th>Jumlah Denda</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($denda as $item)
                <tr>
                    <td>{{ $item->peminjaman->users->nama ?? 'Tidak diketahui' }}</td>
                    <td>{{ $item->peminjaman->buku->judul_buku ?? 'Tidak diketahui' }}</td>
                    <td>Rp {{ number_format($item->peminjaman->denda, 0, '.', '.') }}</td>
                    <td>{{ $item->metode_pembayaran ?? 'Tidak diketahui' }}</td>
                    <td>
                        @if ($item->bukti_pembayaran)
                            <img src="{{ asset('storage/'.$item->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 100px;">
                        @else
                            Tidak ada bukti pembayaran
                        @endif
                    </td>
                    <td>
                        @if ($item->pembayaran_status === 'Konfirmasi')
                            <span class="text-success">Sudah Dibayar</span>
                        @elseif ($item->pembayaran_status === 'Pending')
                            <span class="text-danger">Pending</span>
                        @else
                            <span class="text-warning">Belum Dibayar</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->pembayaran_status === 'Pending')
                            <button wire:click="changeStatus({{ $item->id }})" class="btn btn-success btn-sm">
                                Konfirmasi
                            </button>
                        @else
                            <button class="btn btn-primary btn-sm" disabled>Terkonfirmasi</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
