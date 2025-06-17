@include('templates.navbar')
    <main id="main-content">
        <div class="p-8 pt-0">
            <section class="relative w-full reviews-hero flex items-center justify-center text-white text-center">
                <div class="absolute inset-0 bg-black opacity-40 z-0"></div>
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h1 class="text-5xl font-bold font-hero mb-4 animate-fade-in">Ulasan dari Pengunjung Kami</h1>
                    <p class="text-xl opacity-90 animate-fade-in">Dengar langsung pengalaman tak terlupakan dari mereka yang telah berkemah bersama kami.</p>
                </div>
            </section>

            <section class="py-16 bg-light-gray-bg rounded-xl shadow-lg mt-8 max-w-6xl mx-auto p-8">
                <h2 class="text-3xl font-bold font-hero text-dark-text text-center mb-10">Semua Ulasan</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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

                    <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <img src="../images/avatar-4.jpg" alt="Avatar Maria Lopez" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="text-xl font-semibold text-dark-text">Maria Lopez</h4>
                                <div class="text-gold-accent text-lg">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">"Tempat yang sempurna untuk melepaskan diri dari hiruk pikuk kota. Lingkungan yang damai dan fasilitas yang lengkap. Sangat cocok untuk relaksasi!"</p>
                        <p class="text-gray-500 text-sm">1 bulan lalu</p>
                    </div>

                    <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <img src="../images/avatar-5.jpg" alt="Avatar Alex Chen" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="text-xl font-semibold text-dark-text">Alex Chen</h4>
                                <div class="text-gold-accent text-lg">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">"Pelayanan staf sangat ramah dan responsif. Mereka memastikan semua kebutuhan kami terpenuhi. Pengalaman yang luar biasa dari awal hingga akhir."</p>
                        <p class="text-gray-500 text-sm">Minggu lalu</p>
                    </div>

                    <div class="review-card bg-white p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <img src="../images/avatar-6.jpg" alt="Avatar Sarah Brown" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="text-xl font-semibold text-dark-text">Sarah Brown</h4>
                                <div class="text-gold-accent text-lg">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">"Sangat terkesan dengan kebersihan dan perawatan tenda. Merasa seperti di hotel bintang lima di tengah hutan. Anak-anak juga sangat senang!"</p>
                        <p class="text-gray-500 text-sm">2 bulan lalu</p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <button class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-full font-medium transition-all duration-300 shadow-md">
                        Muat Lebih Banyak Ulasan
                    </button>
                </div>
            </section>
        </div>
    </main>

    @include('templates.footer')
