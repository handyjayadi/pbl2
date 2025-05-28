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