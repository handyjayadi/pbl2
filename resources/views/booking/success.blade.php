@extends('templates.navbar')
<div class="container">
<main class="main-content">
    <div class="p-8 pt-0">
    <h1 class="text-3xl font-bold text-green-600 mb-4">Pembayaran Berhasil!</h1>
    <p class="text-lg mb-2">Terima kasih, {{ $booking->nama }}.</p>
    <p class="text-gray-600">Pesanan Anda untuk tenda <strong>{{ $booking->tenda->nama }}</strong> telah dikonfirmasi.</p>
    </div>
</main>
</div>  
@include('templates.footer')
