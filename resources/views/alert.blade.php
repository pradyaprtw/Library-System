
@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
    });
</script>
@elseif (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
    });
</script>
@elseif (session('denda'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Denda anda',
        text: '{{ session('denda') }}',
    });
</script>
{{-- Jika ada denda --}}
{{-- @elseif(session('denda') > 0)
<script>
    Swal.fire({
        title: 'Anda mendapatkan denda!',
        text: '{{ session('denda') }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Bayar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Menutup SweetAlert dan membuka modal bayar_denda
            $('#dendaModal').modal('show');
            // Menambahkan data ke modal
            $('#bukuField').val('{{ session('judul_buku') }}'); // Pastikan session menyimpan data buku
            $('#dendaField').val('Rp{{ number_format(session('denda'), 0, ',', '.') }}');
            $('#dendaForm').attr('action', '{{ route("konfirmasi.denda", ["id" => session('id')]) }}');
        }
    });
</script> --}}
@endif