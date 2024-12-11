<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PeminjamanModel;

class TestDenda extends Command
{
    protected $signature = 'test:denda';
    protected $description = 'Test perhitungan denda peminjaman';

    public function handle()
    {
        PeminjamanModel::where('status', 'Dipinjam')
            ->where('tanggal_pengembalian', '<', now())
            ->chunk(100, function ($peminjamans) {
                foreach ($peminjamans as $peminjaman) {
                    $keterlambatan = now()->diffInDays($peminjaman->tanggal_pengembalian);
                    $dendaPerHari = 5000;

                    $peminjaman->update([
                        'denda' => $keterlambatan * $dendaPerHari
                    ]);

                    $this->info("ID: {$peminjaman->id} | Denda: {$peminjaman->denda}");
                }
            });

        $this->info('Testing selesai!');
    }
}

