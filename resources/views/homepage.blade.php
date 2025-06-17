
    @include('templates.navbar') 
    <!-- MAIN SECTION -->
    <main id="main-content">
        <div class="p-8 pt-0">
            <section class="relative w-full h-auto md:h-screen hero-image pt-20 md:pt-0">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-60 z-0"></div>

                <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 md:px-6 py-32 md:py-0 text-center">
                    <div class="max-w-4xl mx-auto animate-fade-in px-4">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl text-white font-hero mb-4 md:mb-6">
                            FEEL THE LUXURY OF CAMPING
                        </h1>
                        <p class="text-base md:text-lg text-white mb-8 md:mb-12 max-w-xl mx-auto opacity-90 font-light">
                            Discover pure luxury in every corner of our CampHarmoni.
                        </p>

                        <div class="rounded-xl w-full max-w-4xl mx-auto">
                            <form id="bookingForm" action="{{ route('booking') }}" method="GET">
                                <div class="flex justify-center items-center">
                                    
                                    <button type="submit" class="group rounded-full bg-white flex items-center justify-center text-teal-700 text-lg font-semibold tracking-wider transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg py-4 px-10">
                                        <span>Pesan Sekarang</span>
                                        <i class="fas fa-arrow-right ml-3 transition-transform duration-300 group-hover:translate-x-2"></i>
                                    </button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-8 left-8 right-8 z-10 flex flex-col md:flex-row justify-between items-end">
                    <div class="text-white max-w-xl text-left mb-8 md:mb-0">
                        <p class="text-lg leading-relaxed font-light">
                            We embrace the appeal of adventure, realizing that everyone deserves the opportunity to embark on their own camping adventure, finding comfort and style amidst new surroundings.
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-8 md:gap-16 text-white text-left">
                        <div class="text-left stat-item transition-all duration-300">
                            <div class="text-4xl font-bold font-hero text-white">121+</div>
                            <div class="text-gray-300 text-xs uppercase tracking-widest mt-2">Capital Raised</div>
                        </div>
                        <div class="text-left stat-item transition-all duration-300">
                            <div class="text-4xl font-bold font-hero text-white">90+</div>
                            <div class="text-gray-300 text-xs uppercase tracking-widest mt-2">Happy Customer</div>
                        </div>
                        <div class="text-left stat-item transition-all duration-300">
                            <div class="text-4xl font-bold font-hero text-white">1.5K+</div>
                            <div class="text-gray-300 text-xs uppercase tracking-widest mt-2">Property Option</div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 w-full mt-16">
                <h2 class="text-4xl md:text-5xl font-extrabold font-hero text-primary mb-6 drop-shadow-lg tracking-tight text-center">
                    Tenda & Akomodasi Pilihan Kami
                </h2>
                <p class="text-lg md:text-xl text-gray-600 mb-14 max-w-2xl mx-auto font-light text-center">
                    Pilih akomodasi yang paling sesuai dengan gaya petualangan Anda, dari tenda mewah hingga suite keluarga.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12">
                    @foreach ($tenda as $index => $item)
                    <!-- Card 1-->
                    <div class="accommodation-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 hover:shadow-xl transition-all duration-300 border border-gray-100 group relative">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Tenda Deluxe" class="w-full h-64 object-cover group-hover:brightness-95 transition duration-300">
                        </div>
                        <div class="p-6 text-left">
                            <h3 class="text-xl font-bold text-primary mb-3">{{$item->nama}}</h3>
                            <p class="text-gray-500 text-sm mb-5 leading-relaxed">
                                {{$item->deskripsi}}
                            </p>
                            <div class="flex justify-between items-center pt-4 pb-0 border-t border-gray-100">
                                <div>
                                    <span class="text-lg font-bold text-primary">{{ number_format($item->harga) }}</span>
                                    <span class="text-xs text-gray-400 block">per malam</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
               
                <!-- Tombol Lihat Selengkapnya -->
                <div class="flex justify-center mt-10">
                    <a href="{{ route('tenda.user') }}" class="bg-primary text-white px-8 py-3 rounded-full font-bold text-lg shadow-lg hover:bg-primary-dark transition-all duration-300">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>      <!-- FASILITAS SECTION -->
            <section class="py-12 md:py-16 bg-light-gray-bg text-center rounded-xl shadow-lg mt-8 mx-4 md:mx-0">
                <div class="max-w-6xl mx-auto px-4 md:px-6">
                    <h2 class="text-2xl md:text-4xl font-bold font-hero text-dark-text mb-4">Fasilitas Unggulan Kami</h2>
                    <p class="text-sm md:text-lg text-gray-700 mb-8 md:mb-12 max-w-2xl mx-auto">
                        Nikmati pengalaman camping premium dengan fasilitas terbaik yang kami sediakan untuk kenyamanan Anda.
                    </p>

                    <!-- Card fasilitas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/tent-icon.png" alt="Private Tent Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Tenda Pribadi Mewah</h3>
                            <p class="text-sm md:text-base text-gray-600">Setiap tenda dilengkapi dengan kasur nyaman, pencahayaan, dan area bersantai pribadi.</p>
                        </div>

                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/bonfire-icon.png" alt="Bonfire Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Area Api Unggun</h3>
                            <p class="text-gray-600">Nikmati malam yang hangat dengan api unggun komunal dan pemandangan bintang.</p>
                        </div>

                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/restroom-icon.png" alt="Restroom Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Kamar Mandi Modern</h3>
                            <p class="text-gray-600">Fasilitas kamar mandi bersih dengan air panas dan perlengkapan mandi premium.</p>
                        </div>

                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/activities-icon.png" alt="Activities Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Aktivitas Outdoor</h3>
                            <p class="text-gray-600">Beragam kegiatan seperti hiking, memancing, dan yoga pagi tersedia untuk Anda.</p>
                        </div>

                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/dining-icon.png" alt="Dining Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Hidangan Gourmet</h3>
                            <p class="text-gray-600">Sajikan hidangan lezat yang dimasak oleh koki profesional, langsung di area camping Anda.</p>
                        </div>

                        <div class="facility-card bg-white p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <img src="../images/wifi-icon.png" alt="Wi-Fi Icon" class="h-16 md:h-20 w-16 md:w-20 mx-auto mb-4 md:mb-6">
                            <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-2 md:mb-3">Akses Wi-Fi</h3>
                            <p class="text-gray-600">Tetap terhubung dengan akses Wi-Fi berkecepatan tinggi di seluruh area.</p>
                        </div>
                    </div>

                    <!-- ACTIVITY RECOMENDATION-->
                    <h2 class="text-2xl md:text-4xl font-bold font-hero text-dark-text mb-4 mt-16">Rekomendasi Aktivitas</h2>
                    <p class="text-sm md:text-lg text-gray-700 mb-8 md:mb-12 max-w-2xl mx-auto">
                        Jadikan pengalaman camping Anda lebih berkesan dengan beragam aktivitas seru yang kami tawarkan.
                    </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                            <div class="activity-card bg-white p-6 md:p-8 rounded-xl shadow-lg flex flex-col sm:flex-row items-center hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                                <img src="../images/hiking-icon.png" alt="Hiking Icon" class="h-14 md:h-16 w-14 md:w-16 mb-4 sm:mb-0 sm:mr-4 md:mr-6">
                                <div class="text-center sm:text-left">
                                    <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-1 md:mb-2">Jelajah Alam dengan Hiking</h3>
                                    <p class="text-sm md:text-base text-gray-600">Nikmati pemandangan spektakuler melalui jalur hiking yang bervariasi.</p>
                                </div>
                            </div>
                            <div class="activity-card bg-white p-6 md:p-8 rounded-xl shadow-lg flex flex-col sm:flex-row items-center hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                                <img src="../images/stargazing-icon.png" alt="Stargazing Icon" class="h-14 md:h-16 w-14 md:w-16 mb-4 sm:mb-0 sm:mr-4 md:mr-6">
                                <div class="text-center sm:text-left">
                                    <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-1 md:mb-2">Malam Bertabur Bintang</h3>
                                    <p class="text-sm md:text-base text-gray-600">Saksikan keindahan gugusan bintang di langit malam yang bersih.</p>
                                </div>
                            </div>
                            <div class="activity-card bg-white p-6 md:p-8 rounded-xl shadow-lg flex flex-col sm:flex-row items-center hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                                <img src="../images/fishing-icon.png" alt="Fishing Icon" class="h-14 md:h-16 w-14 md:w-16 mb-4 sm:mb-0 sm:mr-4 md:mr-6">
                                <div class="text-center sm:text-left">
                                    <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-1 md:mb-2">Memancing di Danau Tenang</h3>
                                    <p class="text-sm md:text-base text-gray-600">Relaksasi di tepi danau sambil menunggu ikan-ikan menyambar.</p>
                                </div>
                            </div>
                            <div class="activity-card bg-white p-6 md:p-8 rounded-xl shadow-lg flex flex-col sm:flex-row items-center hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                                <img src="../images/yoga-icon.png" alt="Yoga Icon" class="h-14 md:h-16 w-14 md:w-16 mb-4 sm:mb-0 sm:mr-4 md:mr-6">
                                <div class="text-center sm:text-left">
                                    <h3 class="text-xl md:text-2xl font-bold font-hero text-dark-text mb-1 md:mb-2">Yoga Pagi di Tengah Alam</h3>
                                    <p class="text-sm md:text-base text-gray-600">Mulai hari Anda dengan ketenangan yoga di antara pepohonan hijau.</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <!-- TESTIMONIAL SECTION -->
            <section class="py-16 text-center">
                <div class="max-w-6xl mx-auto px-6">
                    <h2 class="text-4xl font-bold font-hero text-dark-text mb-4">Apa Kata Pengunjung Kami?</h2>
                    <p class="text-lg text-gray-700 mb-12 max-w-2xl mx-auto">
                        Dengar langsung pengalaman tak terlupakan dari mereka yang telah berkemah bersama kami.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-4">
                                <img src="../images/avatar-1.jpg" alt="Avatar John Doe" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-xl font-semibold text-dark-text">John Doe</h4>
                                    <div class="text-gold-accent text-lg">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4">"Pengalaman camping terbaik! Tenda sangat nyaman, fasilitas bersih, dan staf sangat membantu. Pemandangan alamnya juga luar biasa indah!"</p>
                            <p class="text-gray-500 text-sm">2 minggu lalu</p>
                        </div>

                        <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-4">
                                <img src="../images/avatar-2.jpg" alt="Avatar Jane Smith" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-xl font-semibold text-dark-text">Jane Smith</h4>
                                    <div class="text-gold-accent text-lg">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4">"Sangat puas dengan fasilitas dan kegiatan outdoornya. Kami sangat menikmati hiking dan api unggun di malam hari. Pasti akan kembali lagi!"</p>
                            <p class="text-gray-500 text-sm">1 bulan lalu</p>
                        </div>

                        <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-4">
                                <img src="../images/avatar-3.jpg" alt="Avatar Peter Jones" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-xl font-semibold text-dark-text">Peter Jones</h4>
                                    <div class="text-gold-accent text-lg">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4">"Kualitas makanan gourmetnya melebihi ekspektasi untuk sebuah tempat camping. Suasana tenang dan pemandangan luar biasa. Sangat direkomendasikan!"</p>
                            <p class="text-gray-500 text-sm">3 minggu lalu</p>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
    </main>
    <!-- END MAIN SECTION -->
   
    <!-- CALL TO ACTION -->
    <section class="bg-primary py-16 md:py-20 text-white text-center px-4 md:px-0">
        <div class="max-w-4xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold font-hero mb-4 md:mb-6 leading-tight">
                Siap untuk Petualangan Camping Tak Terlupakan?
            </h2>
            <p class="text-base md:text-xl lg:text-2xl mb-6 md:mb-10 opacity-90">
                Jangan lewatkan kesempatan untuk merasakan kemewahan berkemah di alam bebas.
            </p>
            <a href="booking.html" class="booking.html" class="inline-block bg-white text-primary hover:bg-gray-100 px-6 py-3 md:px-10 md:py-4 rounded-full font-bold text-base md:text-lg transition-all duration-300 transform hover:scale-105 shadow-xl">
                Pesan Sekarang
            </a>
        </div>
    </section>

    

    
 @include('templates.footer') 
    