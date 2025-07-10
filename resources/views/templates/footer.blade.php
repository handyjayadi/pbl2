<!-- CHATBOT BUTTON -->
            
            <!-- ACCESSIBILITY BUTTON -->
    <button id="accessibility-toggle" class="fixed bottom-8 left-8 bg-gray-700 text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-gray-700 focus:ring-opacity-50" aria-label="Pengaturan Aksesibilitas">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <!-- ACCESSIBILITY MODAL -->
    <div id="accessibility-panel" class="fixed bottom-24 left-8 bg-white rounded-xl shadow-2xl p-6 w-80 z-50 hidden border border-gray-100 transform transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center mb-5">
            <h4 class="text-xl font-bold text-primary flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Pengaturan Aksesibilitas
            </h4>
            <button id="accessibility-close" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" aria-label="Tutup Pengaturan Aksesibilitas">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="space-y-6">
            <!-- High Contrast Toggle -->
            <div class="flex items-center justify-between">
                <div>
                    <label for="contrast-toggle" class="block text-gray-700 font-medium mb-1">Mode Kontras Tinggi</label>
                    <p class="text-sm text-gray-500">Tingkatkan visibilitas teks</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="contrast-toggle" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>

            <!-- Font Size Controls -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Ukuran Font</label>
                <div class="flex space-x-3">
                    <button id="font-small" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-all duration-200 flex items-center justify-center" aria-label="Ukuran Font Kecil">
                        <span class="text-sm font-bold">A-</span>
                    </button>
                    <button id="font-normal" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-all duration-200 flex items-center justify-center border-2 border-primary" aria-label="Ukuran Font Normal">
                        <span class="text-base font-bold">A</span>
                    </button>
                    <button id="font-large" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-all duration-200 flex items-center justify-center" aria-label="Ukuran Font Besar">
                        <span class="text-lg font-bold">A+</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100">
            <button id="reset-accessibility" class="text-sm text-primary hover:text-primary-dark font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Reset Pengaturan
            </button>
        </div>
    </div>

            <script type="module">
                import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
                Chatbot.init({
                    chatflowid: "287fc332-22a5-4e77-9606-9d9ecb568f3c",
                    apiHost: "http://localhost:3000",
                    theme: {
                        button: {
                            backgroundColor: "#9e5336", // warna oranye
                            iconColor: "#FFFFFF"        // warna ikon putih
                        }
                    }
                })
            </script>

<!-- FOOTER -->
    <footer class="bg-dark-text py-12 md:py-16 text-gray-300 px-4 md:px-0">
        <div class="max-w-6xl mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            <div>
                <h3 class="text-3xl font-bold font-hero text-white mb-4">PohonSurgaCamp</h3>
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
                    <li class="mb-3"><a href="{{route('homepage')}}" class="hover:text-white transition-colors duration-300">Beranda</a></li>
                    <li class="mb-3"><a href="{{route('booking')}}" class="hover:text-white transition-colors duration-300">Pesan Sekarang</a></li>
                    <li class="mb-3"><a href="{{route('gallery')}}" class="hover:text-white transition-colors duration-300">Gallery</a></li>
                    <li class="mb-3"><a href="{{route('about')}}" class="hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                    <li class="mb-3"><a href="{{route('review')}}" class="hover:text-white transition-colors duration-300">Ulasan Pengunjung</a></li>
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
    <!-- END FOOTER -->
         <script src="../js/main.js"></script>
    <script src="../js/accessibility.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
    const dropdownBtn = document.getElementById('userDropdownBtn');
    const dropdownMenu = document.getElementById('userDropdown');

    if (dropdownBtn) {
        dropdownBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Klik di luar dropdown untuk menutup
        window.addEventListener('click', function (e) {
            if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
</script>

</body>
</html>