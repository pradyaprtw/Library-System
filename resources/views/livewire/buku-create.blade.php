<div>
    <form wire:submit="store">
        @csrf
        <div class="card">
            <div class="card-header">Form Tambah Buku</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" 
                           id="judul_buku" wire:model="judul_buku" required>
                    @error('judul_buku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                           id="penulis" wire:model="penulis" required>
                    @error('penulis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" 
                           id="penerbit" wire:model="penerbit" required>
                    @error('penerbit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" 
                           id="tahun_terbit" wire:model="tahun_terbit" required>
                    @error('tahun_terbit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kategori">Kategori</label>
                    <select id="id_kategori" wire:model="id_kategori" 
                            class="form-control @error('id_kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                           id="stok" wire:model="stok" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                           id="foto" wire:model="foto">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($foto)
                        <img src="{{ $foto->temporaryUrl() }}" class="img-thumbnail mt-2" width="200">
                    @else
                        <span class="text-muted">Belum ada foto</span>
                    @endif
                </div>

                <button  type="submit" class="btn btn-primary">Tambah Buku</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>