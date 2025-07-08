<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use App\Models\Tenda;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Ambil notifikasi dari Midtrans
        $notif = new Notification();

        // Log awal callback
        Log::info('✅ Callback Midtrans masuk!');
        Log::info('📦 Data dari Midtrans:', (array)$notif);

        // Ambil data penting
        $transactionStatus = $notif->transaction_status;
        $paymentType = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraudStatus = $notif->fraud_status;

        // Ambil data booking dari database
        Log::info("🔍 Mencari booking dengan order_id: $orderId");
        $booking = Booking::where('order_id', $orderId)->first();

        if (!$booking) {
            Log::warning("⚠️ Booking tidak ditemukan dengan order_id: $orderId");
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Cek status saat ini untuk hindari update/stok ganda
        $oldStatus = $booking->status;

        // Update status booking sesuai status transaksi
        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                $booking->status = ($fraudStatus == 'challenge') ? 'pending' : 'paid';
            }
        } elseif ($transactionStatus == 'settlement') {
            $booking->status = 'paid';
        } elseif ($transactionStatus == 'pending') {
            $booking->status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $booking->status = 'failed';
        }

        // Kurangi stok hanya jika status baru adalah 'paid' dan sebelumnya bukan 'paid'
        if ($booking->status == 'paid' && $oldStatus !== 'paid') {
            $tenda = Tenda::find($booking->tenda_id);

            if ($tenda) {
                if ($tenda->stok >= $booking->jumlah) {
                    $tenda->stok -= $booking->jumlah;
                    $tenda->save();
                    Log::info("📉 Stok tenda ID {$tenda->id} berhasil dikurangi: -{$booking->jumlah}");
                } else {
                    Log::warning("❌ Stok tenda ID {$tenda->id} tidak cukup. Stok saat ini: {$tenda->stok}");
                }
            } else {
                Log::warning("❌ Tenda tidak ditemukan. ID: {$booking->tenda_id}");
            }
        }

        // Simpan perubahan jika ada
        if ($booking->isDirty()) {
            $booking->save();
            Log::info("✅ Booking dengan order_id $orderId diupdate jadi: {$booking->status}");
        } else {
            Log::info("ℹ️ Booking tidak berubah, tidak disimpan.");
        }

        return response()->json([
            'message' => 'Callback processed',
            'status_dikirim' => $transactionStatus,
            'order_id' => $orderId,
            'status_di_db' => $booking->status,
        ], 200);
    }
}
