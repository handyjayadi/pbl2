@include('templates.navbar')


<div class="max-w-6xl mx-auto px-4 py-10 mt-10">
    <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Riwayat Pemesanan</h2>

    <!-- Filter tanggal -->
    <form method="GET" class="flex flex-col md:flex-row items-center justify-center gap-4 mb-8">
        <div>
            <label for="from_date" class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
            <input type="date" id="from_date" name="from_date" value="{{ request('from_date') }}" class="mt-1 px-3 py-2 border rounded w-full">
        </div>
        <div>
            <label for="to_date" class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
            <input type="date" id="to_date" name="to_date" value="{{ request('to_date') }}" class="mt-1 px-3 py-2 border rounded w-full">
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Filter</button>
        </div>
    </form>

    @forelse ($bookings as $booking)
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 mb-6">
            <div class="mb-2">
                <h3 class="text-xl font-bold text-primary">{{ $booking->tenda->nama }}</h3>
                <p class="text-sm text-gray-600">{{ $booking->check_in }} → {{ $booking->check_out }}</p>
            </div>

            <div class="mb-4">
                <p><strong>Nama:</strong> {{ $booking->nama }} tenda</p>
                <p><strong>Jumlah:</strong> {{ $booking->jumlah }} tenda</p>
                <p><strong>Total:</strong> Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                <p>
                   <strong>Status:</strong>
                    @if ($booking->status === 'paid')
                        <span class="text-green-600 font-semibold">Lunas</span>
                    @elseif ($booking->status === 'expired')
                        <span class="text-red-600 font-semibold">Expired</span>
                    @else
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    @endif

                </p>
                @if ($booking->status === 'paid')
                    <a href="{{ route('booking.invoice', $booking->id) }}"
                    class="bg-gray-800 text-white px-4 py-2 rounded mt-2 inline-block hover:bg-black transition">
                    Print Invoice
                    </a>
                @endif

                @if ($booking->status === 'paid' && !$booking->ulasan)
                    <button
                        onclick="openModal({{ $booking->id }})"
                        class="bg-yellow-500 text-white px-4 py-2 rounded mt-2 hover:bg-yellow-600 transition">
                        Beri Ulasan
                    </button>
                @endif
            </div>

            @if ($booking->status === 'pending')
                <button 
                    class="btn-bayar bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded w-full"
                    data-order-id="{{ $booking->order_id }}"
                    data-nama="{{ $booking->nama }}"
                    data-email="{{ $booking->email }}"
                    data-total="{{ $booking->total_harga }}"
                >
                    Bayar Sekarang
                </button>
            @elseif($booking->status === 'paid')
                <p class="text-sm text-gray-400 text-center">Pembayaran selesai</p>
            @else
                <p class="text-sm text-gray-400 text-center">Pemesanan telah kadaluarsa</p>
            @endif
        </div>
    @empty
        <div class="text-center text-gray-500">
            Belum ada pemesanan.
        </div>
    @endforelse
    
    <div class="mt-6">
    {{ $bookings->links('pagination::tailwind') }}
</div>
</div>

<!-- Modal Ulasan -->
<div id="ulasanModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-xl font-semibold mb-4">Beri Ulasan</h2>
        <form id="formUlasan" method="POST" action="{{ route('ulasan.store') }}">
            @csrf
            <input type="hidden" name="booking_id" id="booking_id">

           <label class="block mb-1">Rating</label>
            <div id="rating-stars" class="flex gap-1 text-2xl mb-4 cursor-pointer text-gray-300">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star" data-value="{{ $i }}"></i>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating" required>

            <label class="block mb-1">Komentar</label>
            <textarea name="komentar" id="komentar" rows="4" class="w-full border px-3 py-2 rounded mb-4" required></textarea>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kirim</button>
            </div>
        </form>
    </div>
</div>


@include('templates.footer')

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.querySelectorAll('.btn-bayar').forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.dataset.orderId;
            const nama = this.dataset.nama;
            const email = this.dataset.email;
            const total = this.dataset.total;

            fetch('/get-snap-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    order_id: orderId,
                    nama: nama,
                    email: email,
                    total: total
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.snapToken) {
                    snap.pay(data.snapToken, {
                        onSuccess: function (result) {
                            window.location.href = '/booking/history';
                        }
                    });
                } else {
                    alert('Gagal mendapatkan token pembayaran.');
                }
            });
        });
    });
</script>
<script>
    const stars = document.querySelectorAll('#rating-stars i');
    const ratingInput = document.getElementById('rating');

    stars.forEach((star) => {
        star.addEventListener('click', () => {
            const ratingValue = star.getAttribute('data-value');
            ratingInput.value = ratingValue;

            // Reset all stars
            stars.forEach(s => {
                s.classList.remove('text-yellow-500');
                s.classList.add('text-gray-300');
            });

            // Highlight up to selected
            for (let i = 0; i < ratingValue; i++) {
                stars[i].classList.add('text-yellow-500');
                stars[i].classList.remove('text-gray-300');
            }
        });
    });

    function openModal(bookingId) {
        document.getElementById('booking_id').value = bookingId;
        document.getElementById('komentar').value = '';
        document.getElementById('rating').value = '';

        // Reset stars
        stars.forEach(s => {
            s.classList.remove('text-yellow-500');
            s.classList.add('text-gray-300');
        });

        document.getElementById('ulasanModal').classList.remove('hidden');
    }
</script>

