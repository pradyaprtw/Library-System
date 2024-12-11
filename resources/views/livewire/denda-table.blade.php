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
            @forelse($denda->sortByDesc(function ($item) {
                // Urutkan berdasarkan status pending, belum bayar, lalu sudah bayar
                // 0 = sudah bayar, 1 = belum bayar, 2 = pending
                return ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Konfirmasi' ? 0 : ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Pending' ? 2 : 1));
            }) as $item)
                <tr>
                    <td>{{ $item->users->nama ?? 'Tidak diketahui' }}</td>
                    <td>{{ $item->buku->judul_buku ?? 'Tidak diketahui' }}</td>
                    <td>Rp {{ number_format($item->denda, 0, '.', '.') }}</td>
                    <td>{{ $item->pembayaran->metode_pembayaran ?? '-' }}</td>
                    <td>
                        @if ($item->pembayaran && $item->pembayaran->bukti_pembayaran)
                            <img src="{{ asset('storage/'.$item->pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 100px;">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Pending')
                            <span class="text-danger">Pending</span>
                        @elseif ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Konfirmasi')
                            <span class="text-success">Sudah Dibayar</span>
                        @else
                            <span class="text-warning">Belum Dibayarkan</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Pending')
                            <button wire:click="changeStatus({{ $item->pembayaran->id }})" class="btn btn-primary btn-sm">Konfirmasi</button>
                        @else
                            @if ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Konfirmasi')
                                <button class="btn btn-success btn-sm" disabled>Terkonfirmasi</button>
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

