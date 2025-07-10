<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OwnerBookingController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->month ?? date('m');
        $year = $request->year ?? date('Y');

        $bookings = Booking::with(['user', 'tenda'])
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->where('status', 'paid')
            ->paginate(5);

        return view('owner.historydata', compact('bookings', 'month', 'year'));
    }

    public function downloadPdf(Request $request)
    {
        $month = $request->month ?? date('m');
        $year = $request->year ?? date('Y');

        $bookings = Booking::with(['user', 'tenda'])
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        $pdf = Pdf::loadView('owner.historyprint', compact('bookings', 'month', 'year'));
        return $pdf->download("booking_{$month}_{$year}.pdf");
    }
}
