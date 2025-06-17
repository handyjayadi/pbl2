@include('templates.navbar')
    <main id="main-content">
        <div class="p-8 pt-0">
            <section class="relative w-full booking-hero flex items-center justify-center text-white text-center">
                <div class="absolute inset-0 z-0">
                    <img src="../images/camping-view.jpg" class="w-full h-auto" alt="">
                </div>
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h1 class="text-5xl font-bold font-hero mb-4 animate-fade-in">Pesan Petualangan Anda</h1>
                    <p class="text-xl opacity-90 animate-fade-in">Rencanakan kunjungan Anda sekarang dan nikmati pengalaman camping mewah yang tak terlupakan.</p>
                </div>
            </section>

            <!-- FORM -->
            <section class="py-16 bg-white rounded-2xl shadow-xl mt-8 max-w-4xl mx-auto p-8 border border-gray-200">
                <h2 class="text-4xl font-extrabold font-hero text-dark-text text-center mb-12">Formulir Pemesanan</h2>
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    <div class="md:col-span-2">
                        <h3 class="text-2xl font-bold text-primary mb-5 border-b-2 border-primary-light pb-2">Informasi Kontak</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_depan" class="block text-gray-800 text-sm font-semibold mb-2">Nama Depan</label>
                                <div class="relative">
                                    <input type="text" id="nama_depan" name="nama_depan" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 placeholder-gray-400" placeholder="Nama Depan Anda" required>
                                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label for="nama_belakang" class="block text-gray-800 text-sm font-semibold mb-2">Nama Belakang</label>
                                <div class="relative">
                                    <input type="text" id="nama_belakang" name="nama_belakang" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 placeholder-gray-400" placeholder="Nama Belakang Anda" required>
                                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label for="email" class="block text-gray-800 text-sm font-semibold mb-2">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 placeholder-gray-400" placeholder="email@contoh.com" required>
                                    <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label for="telepon" class="block text-gray-800 text-sm font-semibold mb-2">Nomor Telepon</label>
                                <div class="relative">
                                    <input type="tel" id="telepon" name="telepon" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 placeholder-gray-400" placeholder="+62 812 3456 7890" required>
                                    <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-8">
                        <h3 class="text-2xl font-bold text-primary mb-5 border-b-2 border-primary-light pb-2">Detail Pemesanan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="check_in" class="block text-gray-800 text-sm font-semibold mb-2">Tanggal Check-in</label>
                                <div class="relative">
                                    <input type="date" id="check_in" name="check_in" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800" required>
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label for="check_out" class="block text-gray-800 text-sm font-semibold mb-2">Tanggal Check-out</label>
                                <div class="relative">
                                    <input type="date" id="check_out" name="check_out" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800" required>
                                    <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label for="jumlah_tamu" class="block text-gray-800 text-sm font-semibold mb-2">Jumlah Tamu</label>
                                <div class="relative">
                                    <input type="number" id="jumlah_tamu" name="jumlah_tamu" min="1" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800" value="1" required>
                                    <i class="fas fa-users absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label for="jenis_tenda" class="block text-gray-800 text-sm font-semibold mb-2">Jenis Tenda / Paket</label>
                                <div class="relative">
                                    <select id="jenis_tenda" name="jenis_tenda" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 appearance-none bg-white pr-8">
                                        <option value="standard">Tenda Standard (2 Orang)</option>
                                        <option value="deluxe">Tenda Deluxe (4 Orang)</option>
                                        <option value="family">Tenda Keluarga (6 Orang)</option>
                                        <option value="glamping">Paket Glamping Mewah</option>
                                    </select>
                                    <i class="fas fa-caret-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                                    <i class="fas fa-campground absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label for="permintaan_khusus" class="block text-gray-800 text-sm font-semibold mb-2">Permintaan Khusus (Opsional)</label>
                                <div class="relative">
                                    <textarea id="permintaan_khusus" name="permintaan_khusus" rows="4" class="w-full py-3 px-4 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 text-gray-800 placeholder-gray-400" placeholder="Contoh: Perlu tambahan selimut, alergi makanan tertentu..."></textarea>
                                    <i class="fas fa-sticky-note absolute left-3 top-4 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 text-center mt-10">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-4 px-12 rounded-full focus:outline-none focus:ring-4 focus:ring-primary-light focus:ring-opacity-75 transition-all duration-300 transform hover:scale-105 shadow-lg text-lg">
                            Konfirmasi Pemesanan
                        </button>
                    </div>
                </form>
            </section>

            <section class="py-16 text-center">
                <h2 class="text-3xl font-bold font-hero text-dark-text mb-4">Informasi Penting</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                    Pastikan semua data terisi dengan benar. Anda akan menerima konfirmasi melalui email setelah pemesanan.
                    Untuk pertanyaan lebih lanjut, kunjungi halaman <a href="about.html" class="text-primary hover:underline">Tentang Kami</a> atau <a href="forum.html" class="text-primary hover:underline">Forum</a>.
                </p>
            </section>
        </div>
    </main>

    
@include('templates.footer')
