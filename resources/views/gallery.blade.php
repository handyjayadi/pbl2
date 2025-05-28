@include('templates.navbar')
    <style>
        /* CSS khusus untuk halaman galeri & aktivitas */
        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            /* Tinggi disamakan dengan hero section sebelumnya */
            height: 60vh; 
            margin-top: 5rem;
            border-radius: 1.5rem; /* rounded-2xl */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); /* shadow-xl */
        }

        .slider-wrapper {
            display: flex;
            height: 100%;
            transition: transform 0.7s ease-in-out; /* Animasi geser */
        }

        .slider-slide {
            flex: 0 0 100%; /* Setiap slide mengambil 100% lebar */
            position: relative;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .slider-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.4));
            z-index: 0;
        }

        .slider-content {
            position: relative;
            z-index: 10;
            max-width: 4xl; /* max-w-4xl */
            margin-left: auto;
            margin-right: auto;
            padding: 4rem 1rem; /* py-16 px-4 */
        }

        .slider-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 1rem 1.25rem; /* p-4 */
            border-radius: 9999px; /* rounded-full */
            cursor: pointer;
            z-index: 20;
            transition: background-color 0.3s ease;
        }

        .slider-button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .slider-button.left {
            left: 1.5rem; /* left-6 */
        }

        .slider-button.right {
            right: 1.5rem; /* right-6 */
        }

        .slider-dots {
            position: absolute;
            bottom: 1.5rem; /* bottom-6 */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.75rem; /* gap-3 */
            z-index: 20;
        }

        .slider-dot {
            width: 0.75rem; /* w-3 */
            height: 0.75rem; /* h-3 */
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 9999px; /* rounded-full */
            cursor: pointer;
            transition: background-color 0.3s ease, width 0.3s ease;
        }

        .slider-dot.active {
            background-color: white;
            width: 1.25rem; /* w-5 */
        }

        /* Styling untuk galeri dan aktivitas lainnya tetap sama */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem; /* rounded-lg */
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 50%);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
    </style>
</head>
<body class="font-body bg-gray-50">


    <!-- MAIN CONTENT -->
    <main class="pt-0 p-8" id="main-content">
        <section class="slider-container">
            <div class="slider-wrapper" id="hero-slider-wrapper">
                <div class="slider-slide" style="background-image: url('../images/camping-night.jpg');">
                    <div class="slider-overlay"></div>
                    <div class="slider-content">
                        <h1 class="text-5xl md:text-6xl font-bold font-hero mb-4 animate-fade-in drop-shadow-md">Abadikan Momen, Rasakan Petualangan</h1>
                        <p class="text-xl md:text-2xl opacity-90 animate-fade-in drop-shadow-md">Temukan keindahan CampHarmoni melalui galeri foto kami dan rencanakan petualangan Anda dengan beragam aktivitas.</p>
                    </div>
                </div>
                <div class="slider-slide" style="background-image: url('../images/camping-hero.jpg');">
                    <div class="slider-overlay"></div>
                    <div class="slider-content">
                        <h1 class="text-5xl md:text-6xl font-bold font-hero mb-4 animate-fade-in drop-shadow-md">Glamping Mewah di Tengah Alam</h1>
                        <p class="text-xl md:text-2xl opacity-90 animate-fade-in drop-shadow-md">Nikmati kenyamanan bintang lima dengan pemandangan pegunungan yang menakjubkan.</p>
                    </div>
                </div>
                <div class="slider-slide" style="background-image: url('../images/camping-view.jpg');">
                    <div class="slider-overlay"></div>
                    <div class="slider-content">
                        <h1 class="text-5xl md:text-6xl font-bold font-hero mb-4 animate-fade-in drop-shadow-md">Petualangan Menanti Anda!</h1>
                        <p class="text-xl md:text-2xl opacity-90 animate-fade-in drop-shadow-md">Dari hiking hingga api unggun, buat kenangan tak terlupakan bersama kami.</p>
                    </div>
                </div>
            </div>

            <button id="prev-slide" class="slider-button left" aria-label="Previous slide">
                <i class="fas fa-chevron-left text-2xl"></i>
            </button>
            <button id="next-slide" class="slider-button right" aria-label="Next slide">
                <i class="fas fa-chevron-right text-2xl"></i>
            </button>

            <div id="slider-dots" class="slider-dots">
                </div>
        </section>
        ---

        <section class="py-16 bg-white rounded-2xl shadow-xl mt-12 max-w-7xl mx-auto p-8 md:p-12 border border-gray-100">
            <h2 class="text-4xl font-bold font-hero text-dark-text text-center mb-12">Galeri CampHarmoni</h2>
            
            <div class="flex flex-wrap justify-center gap-4 mb-10">
                <button class="filter-btn bg-primary text-white px-6 py-2 rounded-full font-medium hover:bg-primary-dark transition duration-300 shadow-md" data-filter="all">Semua</button>
                <button class="filter-btn bg-gray-200 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-300 transition duration-300" data-filter="tenda">Tenda & Akomodasi</button>
                <button class="filter-btn bg-gray-200 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-300 transition duration-300" data-filter="pemandangan">Pemandangan Alam</button>
                <button class="filter-btn bg-gray-200 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-300 transition duration-300" data-filter="aktivitas">Aktivitas & Event</button>
                <button class="filter-btn bg-gray-200 text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gray-300 transition duration-300" data-filter="fasilitas">Fasilitas Umum</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="gallery-grid">
                <div class="gallery-item category-tenda">
                    <img src="../images/gallery/tenda-deluxe.jpg" alt="Tenda Deluxe CampHarmoni" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Tenda Deluxe</h3>
                    </div>
                </div>
                <div class="gallery-item category-pemandangan">
                    <img src="../images/gallery/pemandangan-danau.jpg" alt="Pemandangan Danau" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Danau Tenang</h3>
                    </div>
                </div>
                <div class="gallery-item category-aktivitas">
                    <img src="../images/gallery/hiking-bersama.jpg" alt="Hiking Bersama" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Hiking Group</h3>
                    </div>
                </div>
                <div class="gallery-item category-fasilitas">
                    <img src="../images/gallery/area-makan.jpg" alt="Area Makan Bersama" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Area Makan</h3>
                    </div>
                </div>
                <div class="gallery-item category-tenda">
                    <img src="../images/gallery/tenda-keluarga.jpg" alt="Tenda Keluarga" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Tenda Keluarga</h3>
                    </div>
                </div>
                <div class="gallery-item category-pemandangan">
                    <img src="../images/gallery/sunset-camp.jpg" alt="Sunset di Camp" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Matahari Terbenam</h3>
                    </div>
                </div>
                <div class="gallery-item category-aktivitas">
                    <img src="../images/gallery/yoga-outdoor.jpg" alt="Yoga Outdoor" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Yoga di Alam</h3>
                    </div>
                </div>
                <div class="gallery-item category-fasilitas">
                    <img src="../images/gallery/toilet-bersih.jpg" alt="Toilet Bersih" class="w-full h-64 object-cover rounded-lg">
                    <div class="gallery-overlay text-white">
                        <h3 class="text-lg font-semibold">Fasilitas Mandi</h3>
                    </div>
                </div>
                </div>

            <div class="text-center mt-12">
                <button class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-full focus:outline-none focus:ring-4 focus:ring-primary-light focus:ring-opacity-75 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Lihat Lebih Banyak Gambar
                </button>
            </div>
        </section>

        ---

        <section class="py-16 bg-white rounded-2xl shadow-xl mt-12 max-w-7xl mx-auto p-8 md:p-12 border border-gray-100">
            <h2 class="text-4xl font-bold font-hero text-dark-text text-center mb-12">Aktivitas Seru di CampHarmoni</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/hiking.jpg" alt="Jalur Hiking Pemandangan" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-hiking mr-3"></i> Hiking & Trekking
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Jelajahi keindahan alam sekitar CampHarmoni melalui jalur hiking yang menantang dan pemandangan menakjubkan. Tersedia panduan berpengalaman.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/bonfire.jpg" alt="Api Unggun Malam" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-fire-alt mr-3"></i> Malam Api Unggun
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Nikmati malam yang hangat dan penuh cerita di sekitar api unggun komunal. Ada sesi *storytelling* dan panggung terbuka setiap akhir pekan.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/stargazing.jpg" alt="Observasi Bintang" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-moon mr-3"></i> Observasi Bintang
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Jauh dari polusi cahaya kota, langit CampHarmoni adalah tempat sempurna untuk mengamati bintang. Tersedia teleskop dan panduan astronomi.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/kayaking.jpg" alt="Kayaking di Danau" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-water mr-3"></i> Kayaking & Kano
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Rasakan ketenangan danau dengan menyewa kayak atau kano. Tersedia pelatihan singkat bagi pemula.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/cooking-class.jpg" alt="Kelas Memasak Outdoor" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-utensils mr-3"></i> Kelas Memasak Outdoor
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Pelajari cara membuat hidangan lezat dengan bahan-bahan lokal dalam sesi memasak di alam terbuka.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="../images/activities/wildlife-spotting.jpg" alt="Pengamatan Satwa Liar" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-primary mb-3 flex items-center">
                            <i class="fas fa-paw mr-3"></i> Pengamatan Satwa Liar
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">Dengan panduan profesional, temukan keanekaragaman hayati lokal di habitat aslinya. Ideal untuk pecinta alam.</p>
                        <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full text-sm font-medium transition duration-300">
                            Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="booking.html" class="bg-accent-light hover:bg-accent text-dark-text font-bold py-3 px-8 rounded-full focus:outline-none focus:ring-4 focus:ring-accent-light focus:ring-opacity-75 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-calendar-alt mr-3"></i> Pesan Pengalaman Anda Sekarang!
                </a>
            </div>
        </section>
    </main>

    <button id="chatbot-toggle" class="fixed bottom-8 right-8 bg-primary text-white p-4 rounded-full shadow-lg hover:bg-primary-dark transition-colors duration-300 z-50 focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50" aria-label="Buka Chatbot">
        <i class="fas fa-comments text-2xl"></i>
    </button>

    <div id="chatbot-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[100]" style="display: none;">
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

    <script src="../js/main.js"></script>
    <script src="../js/accessibility.js"></script>
    <script src="../js/chatbot.js"></script>
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