<div>
    <a href="{{ route('buku.create') }}" class="btn btn-sm mb-3" style="background-color: #B03052; color: #FFF4B7">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)  
                <tr>
                    <td>{{$item->judul_buku}}</td>
                    <td>{{$item->penulis}}</td>
                    <td>{{$item->penerbit}}</td>
                    <td>{{$item->tahun_terbit}}</td>
                    <td>{{$item->kategori->nama_kategori}}</td>
                    <td>{{$item->stok}}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}" 
                                 alt="Gambar Buku {{ $item->judul_buku }}"
                                 style="max-width: 100px;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('buku.show', $item->id)}}" class="badge bg-primary">Detail</a>
                        <a href="{{route('buku.edit', $item->id)}}" class="badge bg-warning">Edit</a>
                        <button wire:click="delete({{$item->id}})" class="btn badge bg-danger">Hapus</button>
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>