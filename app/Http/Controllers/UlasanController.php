<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{

    public function index(Request $request)
    {
         $query = Ulasan::with('user', 'booking');

    if ($request->filled('rating')) {
        $query->where('rating', $request->rating);
    }

    $ulasans = $query->latest()->get();

    return view('review', compact('ulasans'));
    }

    public function indexadmin(Request $request)
    {
         $query = Ulasan::with(['user', 'booking']);

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('komentar', 'like', "%$search%")
              ->orWhereHas('user', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%$search%")
                     ->orWhere('email', 'like', "%$search%");
              });
        });
    }

    
        $reviews = $query->latest()->paginate(5);
        return view('admin.reviewManagement', compact('reviews'));
    }

    public function destroy($id)
    {
        Ulasan::destroy($id);
        return redirect()->route('admin.reviewManagement')->with('success', 'Review berhasil dihapus');
    }

    public function create(Booking $booking)
{
    if ($booking->user_id !== Auth::id() || $booking->status !== 'paid') {
        abort(403, 'Anda tidak bisa memberikan ulasan.');
    }

    // Cegah ulasan ganda
    if ($booking->ulasan) {
        return redirect()->route('booking.history')->with('error', 'Ulasan sudah diberikan.');
    }

    return view('ulasan.form', compact('booking'));
}

public function store(Request $request)
{
    $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'komentar'   => 'required|string|max:500',
        'rating'     => 'required|integer|min:1|max:5',
    ]);

    $booking = Booking::findOrFail($request->booking_id);

    if ($booking->user_id !== Auth::id() || $booking->status !== 'paid') {
        abort(403, 'Tidak diizinkan memberi ulasan.');
    }

    // Cek jika sudah memberi ulasan
    if ($booking->ulasan) {
        return redirect()->route('booking.history')->with('error', 'Ulasan sudah ada.');
    }

    Ulasan::create([
        'user_id'    => Auth::id(),
        'booking_id' => $request->booking_id,
        'komentar'   => $request->komentar,
        'rating'     => $request->rating,
    ]);

    return redirect()->route('booking.history')->with('success', 'Ulasan berhasil dikirim!');
}

}
