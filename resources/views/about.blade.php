@include('templates.navbar')

    <main id="main-content">
        <div class="p-8 pt-0">
            <section class="relative w-full about-hero flex items-center justify-center text-white text-center">
                <div class="absolute inset-0 bg-black opacity-40 z-0"></div>
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h1 class="text-5xl font-bold font-hero mb-4 animate-fade-in">Tentang CampHarmoni</h1>
                    <p class="text-xl opacity-90 animate-fade-in">Mengenal lebih dekat visi kami untuk pengalaman camping mewah yang tak tertandingi.</p>
                </div>
            </section>

            <section class="py-16 bg-white rounded-xl shadow-lg mt-8 max-w-6xl mx-auto p-8 flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold font-hero text-dark-text mb-4">Kisah Kami</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        CampHarmoni lahir dari mimpi untuk menciptakan sebuah oasis di tengah alam liar, di mana kemewahan bertemu dengan petualangan. Kami percaya bahwa setiap orang berhak merasakan keindahan camping tanpa mengorbankan kenyamanan.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Sejak didirikan pada tahun 2020, kami telah berdedikasi untuk memberikan pengalaman glamping yang tak terlupakan, dengan fasilitas premium dan layanan personal yang memanjakan.
                    </p>
                </div>
                <div class="md:w-1/2">
                    <img src="../images/about-story.jpg" alt="Our Story" class="rounded-xl shadow-md w-full h-auto object-cover">
                </div>
            </section>

            <section class="py-16 text-center max-w-6xl mx-auto px-6">
                <h2 class="text-3xl font-bold font-hero text-dark-text mb-10">Visi & Misi Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <i class="fas fa-eye text-primary text-5xl mb-4"></i>
                        <h3 class="text-2xl font-bold font-hero text-dark-text mb-3">Visi</h3>
                        <p class="text-gray-700">Menjadi penyedia pengalaman glamping terkemuka yang mengharmonisasikan kemewahan, alam, dan keberlanjutan.</p>
                    </div>
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <i class="fas fa-handshake text-primary text-5xl mb-4"></i>
                        <h3 class="text-2xl font-bold font-hero text-dark-text mb-3">Misi</h3>
                        <ul class="list-disc list-inside text-gray-700 text-left mx-auto max-w-xs">
                            <li>Memberikan fasilitas dan layanan glamping berkualitas tinggi.</li>
                            <li>Mempromosikan pariwisata yang bertanggung jawab dan ramah lingkungan.</li>
                            <li>Menciptakan komunitas pecinta alam yang peduli.</li>
                            <li>Menyediakan platform untuk petualangan dan relaksasi yang tak terlupakan.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-light-gray-bg text-center rounded-xl shadow-lg mt-8 max-w-6xl mx-auto p-8">
                <h2 class="text-3xl font-bold font-hero text-dark-text mb-10">Tim Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <img src="../images/team-member-1.jpg" alt="Team Member 1" class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                        <h4 class="text-xl font-semibold text-dark-text mb-1">Risa Amelia</h4>
                        <p class="text-primary text-sm font-medium mb-3">CEO & Founder</p>
                        <p class="text-gray-600 text-sm">Dengan pengalaman puluhan tahun di industri pariwisata.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <img src="../images/team-member-2.jpg" alt="Team Member 2" class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                        <h4 class="text-xl font-semibold text-dark-text mb-1">Dion Pratama</h4>
                        <p class="text-primary text-sm font-medium mb-3">Manajer Operasional</p>
                        <p class="text-gray-600 text-sm">Ahli dalam manajemen logistik dan kegiatan outdoor.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <img src="../images/team-member-3.jpg" alt="Team Member 3" class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                        <h4 class="text-xl font-semibold text-dark-text mb-1">Citra Kirana</h4>
                        <p class="text-primary text-sm font-medium mb-3">Kepala Pemasaran</p>
                        <p class="text-gray-600 text-sm">Kreator di balik kampanye pemasaran yang inovatif.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="bg-dark-text py-16 text-gray-300">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <h3 class="text-3xl font-bold font-hero text-white mb-4">CampHarmoni</h3>
                <p class="text-sm leading-relaxed mb-4">
                    Destinasi camping mewah Anda di tengah keindahan alam. Nikmati kenyamanan hotel dengan petualangan outdoor.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Facebook"><i class="fab fa-facebook-f text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Twitter"><i class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="Instagram"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300" aria-label="LinkedIn"><i class="fab fa-linkedin-in text-xl"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Jelajahi</h4>
                <ul>
                    <li class="mb-3"><a href="index.html" class="hover:text-white transition-colors duration-300">Beranda</a></li>
                    <li class="mb-3"><a href="about.html" class="hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                    <li class="mb-3"><a href="booking.html" class="hover:text-white transition-colors duration-300">Pesan Sekarang</a></li>
                    <li class="mb-3"><a href="reviews.html" class="hover:text-white transition-colors duration-300">Ulasan Pengunjung</a></li>
                    <li><a href="forum.html" class="hover:text-white transition-colors duration-300">Forum Komunitas</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Layanan</h4>
                <ul>
                    <li class="mb-3"><a href="#" class="hover:text-white transition-colors duration-300">Sewa Tenda</a></li>
                    <li class="mb-3"><a href="#" class="hover:text-white transition-colors duration-300">Pemandu Hiking</a></li>
                    <li class="mb-3"><a href="#" class="hover:text-white transition-colors duration-300">Paket Makanan</a></li>
                    <li class="mb-3"><a href="#" class="hover:text-white transition-colors duration-300">Api Unggun Pribadi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Acara Khusus</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Kontak</h4>
                <p class="mb-3 flex items-center"><i class="fas fa-map-marker-alt mr-3 text-gold-accent"></i> Jl. Contoh No. 123, Bali, Indonesia</p>
                <p class="mb-3 flex items-center"><i class="fas fa-phone mr-3 text-gold-accent"></i> +62 812-3456-7890</p>
                <p class="mb-3 flex items-center"><i class="fas fa-envelope mr-3 text-gold-accent"></i> info@campharmoni.com</p>
                <p class="flex items-center"><i class="fas fa-clock mr-3 text-gold-accent"></i> Buka 24/7</p>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8 text-center text-sm text-gray-500">
            &copy; 2025 CampHarmoni. All rights reserved.
        </div>
    </footer>

    <button id="chatbot-toggle" class="fixed bottom-8 right-8 bg-primary text-white p-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50" aria-label="Buka Chatbot">
        <i class="fas fa-comments text-2xl"></i>
    </button>

    <div id="chatbot-modal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-[100] hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-sm flex flex-col h-3/4 max-h-[600px]">
            <div class="flex justify-between items-center bg-primary text-white p-4 rounded-t-lg">
                <h3 class="text-xl font-bold">Chatbot CampHarmoni</h3>
                <button id="chatbot-close" class="text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white rounded-full p-1" aria-label="Tutup Chatbot">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="flex-1 p-4 overflow-y-auto text-gray-800" id="chat-messages">
                <div class="bg-gray-100 p-3 rounded-lg mb-2 mr-auto max-w-[80%]">Halo! Ada yang bisa kami bantu?</div>
            </div>
            <div class="p-4 border-t border-gray-200 flex">
                <input type="text" id="chat-input" class="flex-1 border border-gray-300 rounded-l-lg p-3 focus:outline-none focus:border-primary" placeholder="Ketik pesan Anda...">
                <button id="chat-send" class="bg-primary text-white p-3 rounded-r-lg hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50" aria-label="Kirim Pesan">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <button id="accessibility-toggle" class="fixed bottom-8 left-8 bg-gray-700 text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-gray-700 focus:ring-opacity-50" aria-label="Pengaturan Aksesibilitas">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

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