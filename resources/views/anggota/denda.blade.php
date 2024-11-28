@extends('layouts.app')

@section('content')
@section('title', 'Riwayat Denda')

@include('/anggota/header')
<div class="container mt-4">
    <h3>Denda Anda</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Jumlah Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($denda as $item)
                <tr>
                    <td>{{ $item->buku->judul_buku }}</td>
                    <td>Rp {{ number_format($item->denda, 0, '.') }}</td>
                    <td>
                        @if($item->bukti_pembayaran != null)
                            <span class="text-success">Sudah Dibayarkan</span>
                        @else
                            <button class="btn btn-primary bayarDendaBtn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#dendaModal"
                                    data-id="{{ $item->id }}"
                                    data-buku="{{ $item->buku->judul_buku }}"
                                    data-denda="{{ $item->denda }}">
                                Bayar Denda
                            </button>
                        @endif
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