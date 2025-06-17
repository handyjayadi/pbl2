@include('templates.navbar')
    <!-- MAIN CONTENT -->
    <main class="pt-0 p-8" id="main-content">
        <!-- HERO SECTION -->
        <section class="relative w-full h-96 md:h-[500px] flex items-center justify-center text-center mt-24 mb-8 rounded-2xl overflow-hidden">
            <!-- Background with overlay -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                    class="w-full h-full object-cover" 
                    alt="Luxury camping in nature">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-black/30"></div>
            </div>
            
            <!-- Content -->
            <div class="relative z-10 max-w-4xl px-6">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-hero mb-4 text-white animate-fade-in">
                    Pesan Petualangan Anda
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-6 animate-fade-in">
                    Rencanakan kunjungan Anda sekarang dan nikmati pengalaman camping mewah yang tak terlupakan.
                </p>
                <a href="#booking-form" class="inline-block bg-white text-primary hover:bg-gray-50 px-8 py-3 rounded-full font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Lihat Lebih Banyak
                    <i class="fas fa-arrow-down ml-2"></i>
                </a>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 w-full">
            <h2 class="text-4xl md:text-5xl font-extrabold font-hero text-primary mb-6 drop-shadow-lg tracking-tight text-center">
                Tenda & Akomodasi Pilihan Kami
            </h2>
            <p class="text-lg md:text-xl text-gray-600 mb-14 max-w-2xl mx-auto font-light">
                Pilih akomodasi yang paling sesuai dengan gaya petualangan Anda, dari tenda mewah hingga suite keluarga.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12">
                <!-- Card 1 -->
                 @foreach ($tenda as $index => $item)
                <div class="accommodation-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 hover:shadow-xl transition-all duration-300 border border-gray-100 group relative">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Tenda Deluxe" class="w-full h-64 object-cover group-hover:brightness-95 transition duration-300">
                    </div>
                    
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-bold text-primary mb-3">{{ $item->nama }}</h3>
                        <p class="text-gray-500 text-sm mb-5 leading-relaxed">
                           {{ $item->deskripsi }}
                        </p>
                        
                        <div class="flex justify-between items-center pt-4 pb-0 border-t border-gray-100">
                            <div>
                                <span class="text-lg font-bold text-primary">Rp{{ number_format($item->harga) }}</span>
                                <span class="text-xs text-gray-400 block">per malam</span>
                            </div>
                            <button class="group flex items-center rounded-full bg-primary text-white text-xs font-medium tracking-wide transition-all duration-200 hover:from-teal-700 hover:to-teal-800 px-5 py-2.5">
                                <span>pesan</span>
                                <i class="fas fa-chevron-right ml-2 text-[0.65rem] transition-transform duration-200 group-hover:translate-x-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                
               
              
                

            </div>
            
        </div>
    </main>

    <script>
        // JavaScript untuk Galeri (Filter Kategori)
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');
            const galleryGrid = document.getElementById('gallery-grid');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-primary', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-800');
                    });
                    this.classList.remove('bg-gray-200', 'text-gray-800');
                    this.classList.add('bg-primary', 'text-white');

                    const filter = this.dataset.filter;

                    galleryGrid.style.opacity = 0;
                    setTimeout(() => {
                        galleryItems.forEach(item => {
                            if (filter === 'all' || item.classList.contains('category-' + filter)) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                        galleryGrid.style.opacity = 1;
                    }, 300);
                });
            });

            // JavaScript untuk Hero Slider
            const sliderWrapper = document.getElementById('hero-slider-wrapper');
            const slides = document.querySelectorAll('.slider-slide');
            const prevButton = document.getElementById('prev-slide');
            const nextButton = document.getElementById('next-slide');
            const dotsContainer = document.getElementById('slider-dots');

            let currentIndex = 0;
            const totalSlides = slides.length;

            // Generate dots
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.classList.add('slider-dot');
                dot.dataset.index = i;
                dotsContainer.appendChild(dot);
                dot.addEventListener('click', () => goToSlide(i));
            }

            const allDots = document.querySelectorAll('.slider-dot');

            function updateSlider() {
                const offset = -currentIndex * 100;
                sliderWrapper.style.transform = `translateX(${offset}%)`;

                allDots.forEach((dot, idx) => {
                    if (idx === currentIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            function goToSlide(index) {
                currentIndex = index;
                if (currentIndex < 0) {
                    currentIndex = totalSlides - 1;
                } else if (currentIndex >= totalSlides) {
                    currentIndex = 0;
                }
                updateSlider();
            }

            prevButton.addEventListener('click', () => {
                goToSlide(currentIndex - 1);
            });

            nextButton.addEventListener('click', () => {
                goToSlide(currentIndex + 1);
            });

            // Auto-slide functionality (optional)
            // setInterval(() => {
            //     goToSlide(currentIndex + 1);
            // }, 5000); // Change slide every 5 seconds

            // Initial update
            updateSlider();
        });
    </script>
    @include('templates.footer')