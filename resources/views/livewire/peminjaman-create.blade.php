<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="card">
            <div class="card-header">Form</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="id_buku">Buku</label>
                    <select class="form-control @error('id_buku') is-invalid @enderror" id="id_buku" wire:model="id_buku">
                        <option value="">Pilih Buku</option>
                        @foreach($buku as $item)
                            <option value="{{ $item->id }}">{{ $item->judul_buku }}</option>
                        @endforeach
                    </select>
                    @error('id_buku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_anggota">Anggota</label>
                    <select class="form-control @error('id_anggota') is-invalid @enderror" id="id_anggota" wire:model="id_anggota">
                        <option value="">Pilih Anggota</option>
                        @foreach($users as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_anggota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_peminjaman">Tanggal Pinjam</label>
                    <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" wire:model="tanggal_peminjaman">
                    @error('tanggal_peminjaman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengembalian">Tanggal Kembali</label>
                    <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" id="tanggal_pengembalian" wire:model="tanggal_pengembalian">
                    @error('tanggal_pengembalian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
            </div>
        </div>
    </form>
</div>
