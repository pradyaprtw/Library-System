<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Nama Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($denda as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->users->nama }}</td>
                                        <td>{{ $item->buku->judul_buku }}</td>
                                        <td>{{ $item->tanggal_peminjaman }}</td>
                                        <td>{{ $item->tanggal_dikembalikan }}</td>
                                        <td>Rp {{ number_format($item->denda, 0, '') }}</td>
                                        <td>{{ $item->metode_pembayaran }}</td>
                                        <td><img src="{{ asset('storage/'.$item->bukti_pembayaran) }}" class="card-img-top" alt="bukti pembayaran" style="width: 100px;"></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data denda.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
