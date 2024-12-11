<div>
    <form wire:submit.prevent="update">
        @csrf
        <div class="card">
            <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                           id="nama" wire:model="nama" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                           id="alamat" wire:model="alamat" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">  
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                            id="no_telepon" wire:model="no_telepon" required>
                    @error('no_telepon')
                        <div class="invalid-feedback">"{{ $message }}"</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                           id="email" wire:model="email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                           id="username" wire:model="username" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" wire:model="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('anggota.home') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>