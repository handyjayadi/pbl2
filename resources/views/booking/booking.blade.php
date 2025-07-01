@include('templates.navbar')
<main id="main-content">
    <div class="p-8 pt-0">
        <!-- Hero Section -->
        <section class="relative w-full booking-hero flex items-center justify-center text-white text-center">
            <div class="absolute inset-0 z-0">
                <img src="../images/camping-view.jpg" class="w-full h-auto" alt="">
            </div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h1 class="text-5xl font-bold font-hero mb-4 animate-fade-in">Pesan Petualangan Anda</h1>
                <p class="text-xl opacity-90 animate-fade-in">Rencanakan kunjungan Anda sekarang dan nikmati pengalaman camping mewah yang tak terlupakan.</p>
            </div>
        </section>

        <!-- Booking Form -->
        <section class="py-16 bg-white rounded-2xl shadow-xl mt-8 max-w-4xl mx-auto p-8 border border-gray-200">
            <h2 class="text-4xl font-extrabold font-hero text-dark-text text-center mb-12">Formulir Pemesanan</h2>
            <form id="booking-form">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    <!-- Informasi Kontak -->
                    <div class="md:col-span-2">
                        <h3 class="text-2xl font-bold text-primary mb-5 border-b-2 border-primary-light pb-2">Informasi Kontak</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block">Nama Lengkap</label>
                                <input type="text" name="nama" required class="w-full border px-4 py-3 rounded">
                            </div>
                            <div>
                                <label class="block">Email</label>
                                <input type="email" name="email" required class="w-full border px-4 py-3 rounded">
                            </div>
                            <!-- <div class="md:col-span-2">
                                <label class="block">No Telepon</label>
                                <input type="text" name="telepon" required class="w-full border px-4 py-3 rounded">
                            </div> -->
                        </div>
                    </div>

                    <!-- Detail Pemesanan -->
                    <div class="md:col-span-2 mt-8">
                        <h3 class="text-2xl font-bold text-primary mb-5 border-b-2 border-primary-light pb-2">Detail Pemesanan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block">Tanggal Check-in</label>
                                <input type="date" name="check_in" required class="w-full border px-4 py-3 rounded">
                            </div>
                            <div>
                                <label class="block">Tanggal Check-out</label>
                                <input type="date" name="check_out" required class="w-full border px-4 py-3 rounded">
                            </div>
                            <div>
                                <label class="block">Jumlah</label>
                                <input type="number" name="jumlah" min="1" required class="w-full border px-4 py-3 rounded">
                            </div>
                            <div>
                                <label class="block">Pilih Tenda</label>
                                <select name="tenda_id" required class="w-full border px-4 py-3 rounded">
                                    @foreach ($tendas as $tenda)
                                        @if ($tenda->stok > 0)
                                            <option value="{{ $tenda->id }}">
                                                {{ $tenda->nama }} - Stok: {{ $tenda->stok }} - Rp{{ number_format($tenda->harga, 0, ',', '.') }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="md:col-span-2 text-center mt-10">
                        <button type="submit" id="pay-button" class="bg-primary hover:bg-primary-dark text-white font-bold py-4 px-12 rounded-full">
                            Konfirmasi & Bayar
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</main>
@include('templates.footer')

<!-- Midtrans Snap -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('booking-form').addEventListener('submit', function(e) {
        e.preventDefault(); // stop form default

        const payButton = document.getElementById('pay-button');
        payButton.disabled = true;
        payButton.innerText = 'Memproses...';

        const formData = new FormData(this);

        fetch("{{ route('booking.checkout') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.snapToken) {
                snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        window.location.href = '/booking/success?order_id=' + data.order_id;
                    },
                    onPending: function(result) {
                        alert("Menunggu pembayaran...");
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal.");
                        payButton.disabled = false;
                        payButton.innerText = 'Konfirmasi & Bayar';
                    }
                });
            } else {
                alert("Terjadi kesalahan: " + (data.message || 'tidak diketahui'));
                payButton.disabled = false;
                payButton.innerText = 'Konfirmasi & Bayar';
            }
        });
    });
</script>
