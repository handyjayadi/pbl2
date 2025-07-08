<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tenda;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function admin(Request $request)
    {
        Booking::where('status', 'pending')
        ->where('expired_at', '<=', now())
        ->update(['status' => 'expired']);

         $query = Booking::with('tenda')->latest();

        // Filter nama & email
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter tanggal check-in
        if ($request->filled('tanggal')) {
            $query->whereDate('check_in', $request->tanggal);
        }

        $transaksi = $query->paginate(5)->withQueryString();

        return view('admin.bookManagement', compact('transaksi'));
    }
    public function index()
    {
        $tendas = Tenda::where('stok', '>', 0)->get();
        return view('booking.booking', compact('tendas'));
    }

    // ✅ AJAX checkout handler
    public function checkout(Request $request)
    {
        $request->validate([
            'tenda_id'    => 'required|exists:tenda,id',
            'nama'        => 'required|string',
            'email'       => 'required|email',
            'jumlah'      => 'required|integer|min:1',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date|after:check_in',
        ]);

        $tenda = Tenda::findOrFail($request->tenda_id);

        if ($tenda->stok < $request->jumlah) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak cukup.',
            ], 400);
        }

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $lamaMenginap = $checkIn->diffInDays($checkOut); // ✅ yang benar
        if ($lamaMenginap < 1) $lamaMenginap = 1;

        $total = $tenda->harga * $request->jumlah * $lamaMenginap;

        $booking = Booking::create([
            'user_id'      => Auth::id(),
            'tenda_id'     => $tenda->id,
            'nama'         => $request->nama,
            'email'        => $request->email,
            'jumlah'       => $request->jumlah,
            'check_in'     => $request->check_in,
            'check_out'    => $request->check_out,
            'total_harga'  => $total,
            'status'       => 'pending',
            'expired_at' => Carbon::now()->addDay(1),
        ]);

        Config::$serverKey     = config('midtrans.server_key');
        Config::$isProduction  = config('midtrans.is_production');
        Config::$isSanitized   = true;
        Config::$is3ds         = true;

        $order_id = 'BOOK-' . $booking->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id'     => $order_id,
                'gross_amount' => (int) $total,
            ],
            'customer_details' => [
                'first_name' => $booking->nama,
                'email'      => $booking->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan token pembayaran: ' . $e->getMessage(),
            ], 500);
        }

         $booking->update([
            'order_id' => $order_id,
            'snap_token' => $snapToken,
        ]);

        return response()->json([
            'success'    => true,
            'redirect'   => route('booking.history'),
            'snapToken'  => $snapToken,
            'order_id'   => $order_id,
            'booking_id' => $booking->id,
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

    public function history(Request $request )
    {
        Booking::where('status', 'pending')
        ->where('expired_at', '<=', now())
        ->update(['status' => 'expired']);

        $query = Booking::with('tenda')
        ->where('user_id', Auth::id())
        ->latest();

    if ($request->has('from_date') && $request->has('to_date')) {
        $query->whereBetween('check_in', [$request->from_date, $request->to_date]);
    }

    $bookings = $query->paginate(5);

    return view('booking.history', compact('bookings'));
    }

    public function getSnapToken(Request $request)
{
    $request->validate([
        'order_id' => 'required',
        'nama' => 'required',
        'email' => 'required|email',
        'total' => 'required|numeric',
    ]);

    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $params = [
        'transaction_details' => [
            'order_id' => $request->order_id,
            'gross_amount' => (int) $request->total,
        ],
        'customer_details' => [
            'first_name' => $request->nama,
            'email' => $request->email,
        ],
    ];

    try {
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['snapToken' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

}
