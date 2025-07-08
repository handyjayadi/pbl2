<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class UpdateExpiredTransactions extends Command
{
    protected $signature = 'transactions:update-expired';
    protected $description = 'Update status transaksi yang pending lebih dari 1 hari menjadi fail';

    public function handle()
    {
        $expiredBookings = Booking::where('status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subDay(1))
            ->get();

        foreach ($expiredBookings as $booking) {
            // (Opsional) Cek status real-time ke Midtrans
            $midtransStatus = $this->checkMidtransStatus($booking->order_id);

            if ($midtransStatus === 'pending' || $midtransStatus === null) {
                $booking->status = 'fail';
                $booking->save();

                $this->info("Booking {$booking->id} di-set menjadi FAIL.");
            }
        }

        $this->info("Update selesai.");
    }

    private function checkMidtransStatus($orderId)
    {
        $serverKey = config('midtrans.server_key');
        $response = Http::withBasicAuth($serverKey, '')
            ->get("https://api.sandbox.midtrans.com/v2/{$orderId}/status");

        if ($response->successful()) {
            return $response->json()['transaction_status'] ?? null;
        }

        return null;
    }
}
