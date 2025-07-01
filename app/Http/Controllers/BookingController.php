<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tenda;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class BookingController extends Controller
{
    public function index()
{
    $tendas = Tenda::all(); // ambil semua tenda untuk ditampilkan di <select>
    return view('booking.booking', compact('tendas'));
}
    public function checkout(Request $request)
{
    $request->validate([
        'tenda_id' => 'required|exists:tenda,id',
        'nama' => 'required|string',
        'email' => 'required|email',
        'jumlah' => 'required|integer|min:1',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after_or_equal:check_in',
    ]);

    $tenda = Tenda::findOrFail($request->tenda_id);

    if ($tenda->stok < $request->jumlah) {
        return response()->json([
            'message' => 'Stok tidak cukup.',
        ], 400);
    }

    $total = $tenda->harga * $request->jumlah;

    $booking = Booking::create([
        'tenda_id' => $tenda->id,
        'nama' => $request->nama,
        'email' => $request->email,
        'jumlah' => $request->jumlah,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'total_harga' => $total,
        'status' => 'pending',
    ]);

    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $order_id = 'BOOK-' . $booking->id . '-' . time();

    $params = [
        'transaction_details' => [
            'order_id' => $order_id,
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => $booking->nama,
            'email' => $booking->email,
        ],
    ];

    $snapToken = Snap::getSnapToken($params);
    $booking->update(['order_id' => $order_id]);

    return response()->json([
        'snapToken' => $snapToken,
        'order_id' => $order_id
    ]);
}


    public function paymentSuccess(Request $request)
    {
        $booking = Booking::where('order_id', $request->order_id)->firstOrFail();

        if ($booking->status !== 'paid') {
            $tenda = $booking->tenda;

            if ($tenda->stok >= $booking->jumlah) {
                $tenda->stok -= $booking->jumlah;
                $tenda->save();
            }

            $booking->status = 'paid';
            $booking->save();
        }

        return view('booking.success', compact('booking'));
    }
}
