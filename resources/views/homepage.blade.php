@include('templates.navbar') 

<!-- MAIN SECTION -->
<main id="main-content">
    <div class="p-4 md:p-8 pt-0">
        <section class="relative w-full h-auto md:h-screen hero-image pt-20 md:pt-0">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-60 z-0"></div>
            <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 md:px-6 py-20 md:py-0 text-center">
                <div class="max-w-2xl md:max-w-4xl mx-auto animate-fade-in">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl text-white font-hero mb-4 md:mb-6">
                        FEEL THE LUXURY OF CAMPING
                    </h1>
                    <p class="text-base md:text-lg text-white mb-8 md:mb-12 opacity-90 font-light">
                        Discover pure luxury in every corner of our CampHarmoni.
                    </p>
                    <div class="w-full max-w-md mx-auto">
                        <form id="bookingForm" action="{{ route('booking') }}" method="GET">
                            <div class="flex justify-center">
                                <button type="submit" class="group rounded-full bg-white flex items-center justify-center text-teal-700 text-base md:text-lg font-semibold px-6 md:px-10 py-3 md:py-4 shadow-lg transition-transform duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                                    <span>Pesan Sekarang</span>
                                    <i class="fas fa-arrow-right ml-3 transition-transform duration-300 group-hover:translate-x-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Tenda -->
        <div class="max-w-7xl mx-auto px-4 md:px-8 mt-16">
            <h2 class="text-3xl md:text-4xl font-extrabold font-hero text-primary mb-6 text-center">
                Tenda & Akomodasi Pilihan Kami
            </h2>
            <p class="text-base md:text-lg text-gray-600 mb-10 max-w-xl mx-auto text-center font-light">
                Pilih akomodasi yang paling sesuai dengan gaya petualangan Anda.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tenda as $index => $item)
                <div class="accommodation-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 hover:shadow-xl transition-all duration-300 border border-gray-100 group relative">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Tenda {{ $item->nama }}" class="w-full h-52 md:h-64 object-cover">
                    </div>
                    <div class="p-4 md:p-6 text-left">
                        <h3 class="text-lg md:text-xl font-bold text-primary mb-2">{{ $item->nama }}</h3>
                        <p class="text-sm text-gray-500 mb-4 leading-relaxed">{{ $item->deskripsi }}</p>
                        <div class="flex justify-between items-center border-t pt-4">
                            <div>
                                <span class="text-lg font-bold text-primary">{{ number_format($item->harga) }}</span>
                                <span class="text-xs text-gray-400 block">per malam</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-10">
                <a href="{{ route('tenda.user') }}" class="bg-primary text-white px-6 md:px-8 py-3 rounded-full font-bold text-base md:text-lg shadow-lg hover:bg-primary-dark transition-all duration-300">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>

        <!-- Section Fasilitas dan Aktivitas -->
        <section class="py-12 md:py-16 bg-light-gray-bg rounded-xl shadow-lg mt-10 mx-2 md:mx-0">
            <div class="max-w-6xl mx-auto px-4 md:px-6">
                <h2 class="text-2xl md:text-4xl font-bold font-hero text-dark-text text-center mb-4">Fasilitas Unggulan Kami</h2>
                <p class="text-sm md:text-lg text-gray-700 mb-8 md:mb-12 max-w-2xl mx-auto text-center">
                    Nikmati pengalaman camping premium dengan fasilitas terbaik kami.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <img src="../images/tent-icon.png" alt="Tenda" class="mx-auto h-16 mb-4">
                        <h3 class="text-lg font-semibold text-dark-text mb-2">Tenda Pribadi Mewah</h3>
                        <p class="text-gray-600 text-sm">Tenda dengan kasur empuk, pencahayaan lembut, dan area santai privat.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <img src="../images/bonfire-icon.png" alt="Api Unggun" class="mx-auto h-16 mb-4">
                        <h3 class="text-lg font-semibold text-dark-text mb-2">Area Api Unggun</h3>
                        <p class="text-gray-600 text-sm">Hangatkan malam dengan api unggun bersama pemandangan bintang.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md text-center">
                        <img src="../images/restroom-icon.png" alt="Kamar Mandi" class="mx-auto h-16 mb-4">
                        <h3 class="text-lg font-semibold text-dark-text mb-2">Kamar Mandi Modern</h3>
                        <p class="text-gray-600 text-sm">Fasilitas bersih dengan air panas dan perlengkapan mandi premium.</p>
                    </div>
                </div>

                <h2 class="text-2xl md:text-4xl font-bold font-hero text-dark-text mt-16 text-center">Rekomendasi Aktivitas</h2>
                <p class="text-sm md:text-lg text-gray-700 mb-8 max-w-2xl mx-auto text-center">
                    Jadikan pengalaman camping Anda lebih berkesan dengan aktivitas seru.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-md flex items-center">
                        <img src="../images/hiking-icon.png" alt="Hiking" class="h-12 w-12 mr-4">
                        <div>
                            <h3 class="text-lg font-semibold text-dark-text mb-1">Jelajah Alam dengan Hiking</h3>
                            <p class="text-gray-600 text-sm">Nikmati jalur hiking dengan pemandangan menakjubkan.</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md flex items-center">
                        <img src="../images/stargazing-icon.png" alt="Stargazing" class="h-12 w-12 mr-4">
                        <div>
                            <h3 class="text-lg font-semibold text-dark-text mb-1">Malam Bertabur Bintang</h3>
                            <p class="text-gray-600 text-sm">Saksikan keindahan langit malam yang jernih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- CALL TO ACTION -->
<section class="bg-primary py-12 md:py-20 text-white text-center px-4">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl md:text-4xl font-bold font-hero mb-4 leading-tight">
            Siap untuk Petualangan Camping Tak Terlupakan?
        </h2>
        <p class="text-base md:text-xl mb-6">
            Jangan lewatkan kesempatan merasakan kemewahan berkemah di alam bebas.
        </p>
        <a href="{{ route('booking') }}" class="inline-block bg-white text-primary hover:bg-gray-100 px-6 py-3 rounded-full font-bold text-base transition-transform duration-300 hover:scale-105 shadow-xl">
            Pesan Sekarang
        </a>
    </div>
</section>

@include('templates.footer')