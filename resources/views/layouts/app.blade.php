
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Library-System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body>
    <main class="py-5">
        @yield('content')
    </main>
    <!-- jQuery (optional if using jQuery-based scripts) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/style.js') }}"></script>
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
    {{-- Jika ada denda --}}
    @elseif(session('denda') > 0)
    <script>
        Swal.fire({
            title: 'Anda mendapatkan denda!',
            text: 'Denda Anda senilai Rp{{ number_format(session('denda'), 0, ',', '.') }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bayar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Pembayaran Berhasil!',
                    'Anda telah berhasil membayar denda.',
                    'success'
                ).then(() => {
                    // Mengirimkan request untuk memproses pembayaran denda
                    window.location.href = '{{ route("bayar.denda", ["id" => $peminjaman->id]) }}'; // Ganti dengan route untuk memproses pembayaran denda
                });
            }
        });
    </script>
    @endif
    @stack('scripts')
</body>
</html>
