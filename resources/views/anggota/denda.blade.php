@extends('layouts.app')

@section('content')
@section('title', 'Riwayat Denda')

@include('/anggota/header')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Denda Anda</div>
                <div class="card-body">
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Jumlah Denda</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($denda->sortBy(function ($item) {
                                // Jika ada bukti pembayaran, maka urutkan berdasarkan tanggal bukti pembayaran
                                // Jika tidak ada bukti pembayaran, maka urutkan berdasarkan null (tidak ada urutan)
                                return ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Konfirmasi' ? 2 : ($item->pembayaran && $item->pembayaran->pembayaran_status === 'Pending' ? 0 : 1));
                            }) as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->buku->judul_buku }}</td>
                                    <td>Rp {{ number_format($item->denda, 0, '.', '.') }}</td>
                                    <td>
                                        @if($item->pembayaran && $item->pembayaran->pembayaran_status)
                                            <span class="text {{ $item->pembayaran->pembayaran_status == 'Pending' ? 'text-danger' : ($item->pembayaran->pembayaran_status == 'Konfirmasi' ? 'text-success' : '') }}">
                                                {{ $item->pembayaran->pembayaran_status == 'Konfirmasi' ? 'Diterima' : $item->pembayaran->pembayaran_status }}
                                            </span>
                                        @else
                                            <span class="text-warning">Belum Dibayar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary bayarDendaBtn"
                                                @if($item->pembayaran && $item->pembayaran->pembayaran_status =='Konfirmasi' || $item->pembayaran && $item->pembayaran->pembayaran_status == 'Pending') disabled @endif
                                                data-bs-toggle="modal" 
                                                data-bs-target="#dendaModal"
                                                data-id="{{ $item->id }}"
                                                data-buku="{{ $item->buku->judul_buku }}"
                                                data-denda="{{ $item->denda }}">
                                            Bayar Denda
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Anda belum memiliki denda.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pembayaran Denda -->
<div class="modal fade" id="dendaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran Denda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="dendaForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <div class="form-control" id="bukuField"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Denda</label>
                        <div class="form-control" id="dendaField"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-select" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="cash">Bayar Tunai</option>
                            <option value="transfer">Transfer Bank</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Konfirmasi Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const bukuField = document.getElementById('bukuField');
    const dendaField = document.getElementById('dendaField');
    const dendaForm = document.getElementById('dendaForm');

    document.querySelectorAll('.bayarDendaBtn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const buku = this.dataset.buku;
            const denda = this.dataset.denda;

            // Set form action dynamically
            dendaForm.action = `/anggota/denda/${id}`;

            // Update modal fields
            bukuField.textContent = buku;
            dendaField.textContent = `Rp ${Number(denda).toLocaleString('id-ID')}`;
        });
    });
});
</script>
@endpush

@endsection
