<div>
    <a href="{{ route('anggota.create') }}" class="btn btn-sm mb-3" style="background-color: #B03052; color: #FFF4B7">Tambah Anggota</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $anggotaItem)
                <tr>
                    <td>{{ $anggotaItem->nama }}</td>
                    <td>{{ $anggotaItem->alamat }}</td>
                    <td>{{ $anggotaItem->no_telepon }}</td>
                    <td>{{ $anggotaItem->email }}</td>
                    <td>{{ $anggotaItem->tanggal_daftar }}</td>
                    <td>{{ $anggotaItem->role->nama ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $anggotaItem->id) }}" class="badge bg-warning">Edit</a>
                        <button wire:click="delete({{ $anggotaItem->id }})" class="btn badge bg-danger">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>