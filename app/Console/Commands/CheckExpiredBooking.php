<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class CheckExpiredBooking extends Command
{
    protected $signature = 'check:expired-booking';
    protected $description = 'Cek booking yang sudah selesai dan kembalikan stok tendanya';

    public function handle()
    {
        $today = now()->toDateString();

        $expiredBookings = Booking::where('status', 'paid')
            ->whereDate('check_out', '<', $today)
            ->get();

        foreach ($expiredBookings as $booking) {
            $tenda = $booking->tenda;
            $tenda->stok += $booking->jumlah;
            $tenda->save();

            $booking->status = 'expired';
            $booking->save();
        }

        $this->info('Expired bookings checked and stock restored.');
    }
}
