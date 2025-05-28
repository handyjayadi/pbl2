
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

                        <div class="booking-box rounded-xl w-full max-w-4xl mx-auto border border-white border-opacity-90 bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm p-4 md:p-6 shadow-md">
                            <div class="grid grid-cols-1 md:grid-cols-4 items-stretch gap-2">
                                <div class="booking-item">
                                    <label class="text-gray-300 text-xs font-medium tracking-wider mb-1 block">Check In</label>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-alt text-gray-400 mr-2 text-xs"></i>
                                        <span class="text-white font-medium text-sm">Sun, 20 Mar 2025</span>
                                    </div>
                                </div>
                                <div class="booking-item">
                                    <label class="text-gray-300 text-xs font-medium tracking-wider mb-1 block">Check Out</label>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-alt text-gray-400 mr-2 text-xs"></i>
                                        <span class="text-white font-medium text-sm">Mon, 21 Mar 2025</span>
                                    </div>
                                </div>
                                <div class="booking-item">
                                    <label class="text-gray-300 text-xs font-medium tracking-wider mb-1 block">Guest</label>
                                    <div class="flex items-center">
                                        <i class="fas fa-user text-gray-400 mr-2 text-xs"></i>
                                        <span class="text-white font-medium text-sm">2 Adults</span>
                                        <i class="fas fa-chevron-down text-gray-400 ml-auto text-xs"></i>
                                    </div>
                                </div>
                                <div class="booking-button-wrapper">
                                    <a href="{{ route('booking') }}" class="w-full h-full rounded-lg bg-white flex items-center justify-center text-book-now-green text-base font-bold tracking-wide transition-all duration-300 hover:scale-[1.02] shadow-sm py-3 px-4">
                                        Book Now
                                    </a>
                                </div>
                            </div>
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

            <!-- FASILITAS SECTION -->
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

    

    <!-- CHATBOT BUTTON -->
    <button id="chatbot-toggle" class="fixed bottom-8 right-8 bg-primary text-white p-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50" aria-label="Buka Chatbot">
        <i class="fas fa-comments text-2xl"></i>
    </button>

    <!-- CHATBOT MODAL -->
    <div id="chatbot-modal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-[100] hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-sm flex flex-col h-3/4 max-h-[600px]">
            <div class="flex justify-between items-center bg-primary text-white p-4 rounded-t-lg">
                <h3 class="text-xl font-bold">Chatbot CampHarmoni</h3>
                <button id="chatbot-close" class="text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white rounded-full p-1" aria-label="Tutup Chatbot">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="flex-1 p-4 overflow-y-auto text-gray-800" id="chat-messages">
                </div>
            <div class="p-4 border-t border-gray-200 flex">
                <input type="text" id="chat-input" class="flex-1 border border-gray-300 rounded-l-lg p-3 focus:outline-none focus:border-primary" placeholder="Ketik pesan Anda...">
                <button id="chat-send" class="bg-primary text-white p-3 rounded-r-lg hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50" aria-label="Kirim Pesan">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ACCESSIBILITY BUTTON -->
    <button id="accessibility-toggle" class="fixed bottom-8 left-8 bg-gray-700 text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-gray-700 focus:ring-opacity-50" aria-label="Pengaturan Aksesibilitas">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <!-- ACCESSIBILITY MODAL -->
    <div id="accessibility-panel" class="fixed bottom-24 left-8 bg-white rounded-lg shadow-xl p-6 w-72 z-50 hidden">
        <h4 class="text-lg font-bold mb-4 text-dark-text">Pengaturan Aksesibilitas</h4>
        <div class="space-y-4">
            <div>
                <label for="contrast-toggle" class="block text-gray-700 font-medium mb-2">Mode Kontras Tinggi</label>
                <input type="checkbox" id="contrast-toggle" class="h-5 w-5 text-primary rounded border-gray-300 focus:ring-primary">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Ukuran Font</label>
                <div class="flex space-x-2">
                    <button id="font-small" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-300 transition-colors duration-200" aria-label="Ukuran Font Kecil">A-</button>
                    <button id="font-normal" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-300 transition-colors duration-200" aria-label="Ukuran Font Normal">A</button>
                    <button id="font-large" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-300 transition-colors duration-200" aria-label="Ukuran Font Besar">A+</button>
                </div>
            </div>
        </div>
        <button id="accessibility-close" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-full p-1" aria-label="Tutup Pengaturan Aksesibilitas">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
 @include('templates.footer') 
    