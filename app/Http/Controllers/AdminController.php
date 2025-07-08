<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->format('Y-m'));

        // Ubah ke awal dan akhir bulan
        $start = Carbon::parse($bulan)->startOfMonth();
        $end = Carbon::parse($bulan)->endOfMonth();

        $totalBookings = Booking::where('status','paid')->count(); // Hitung total semua pesanan
        $monthlyBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $totalRevenue = Booking::where('status', 'paid')
            ->whereBetween('created_at', [$start, $end])
            ->sum('total_harga');

         $monthlyTransactions = Booking::where('status', 'paid')
            ->whereBetween('created_at', [$start, $end])
            ->count();
    return view('admin.adminUtama', compact('totalBookings','monthlyTransactions','totalRevenue', 'bulan'));
    }
    
}
