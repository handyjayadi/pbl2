<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download($id)
    {
        $booking = Booking::with('tenda')->where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $pdf = Pdf::loadView('booking.invoice', compact('booking'))->setPaper('a4');

        return $pdf->download('invoice-' . $booking->order_id . '.pdf');
    }
}
