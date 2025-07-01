@extends('templates.navbar')

<main class="p-10 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">Pembayaran Berhasil!</h1>
    <p class="text-lg mb-2">Terima kasih, {{ $booking->nama }}.</p>
    <p class="text-gray-600">Pesanan Anda untuk tenda <strong>{{ $booking->tenda->nama }}</strong> telah dikonfirmasi.</p>
</main>

@include('templates.footer')
