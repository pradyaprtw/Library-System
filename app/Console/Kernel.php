<?php

namespace App\Console;

use App\Models\PeminjamanModel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        PeminjamanModel::where('status', 'Dipinjam')
            ->where('tanggal_pengembalian', '<', now())
            ->chunk(100, function ($peminjamans) {
                foreach ($peminjamans as $peminjaman) {
                    $keterlambatan = now()->diffInDays($peminjaman->tanggal_pengembalian);
                    $dendaPerHari = 5000;
                    
                    $peminjaman->update([
                        'denda' => $keterlambatan * $dendaPerHari
                    ]);
                }
            });
    })->hourly(); // Jalankan setiap jam
}

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
