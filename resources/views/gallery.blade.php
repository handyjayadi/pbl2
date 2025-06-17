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

        <div id="slider-dots" class="slider-dots"></div>
    </section>

    <!-- FILTER & GALERI -->
    <section class="py-16 bg-white rounded-2xl shadow-xl mt-12 max-w-7xl mx-auto p-8 md:p-12 border border-gray-100">
        <h2 class="text-4xl font-bold font-hero text-dark-text text-center mb-12">Aktivitas Seru di CampHarmoni</h2>

        <div class="flex flex-wrap gap-2 justify-center mb-8">
            <button class="filter-btn bg-primary text-white px-4 py-2 rounded" data-filter="all">Semua</button>
            @foreach ($aktivitas as $kat)
                <button class="filter-btn bg-gray-200 text-gray-800 px-4 py-2 rounded" data-filter="{{ $kat->id }}">{{ $kat->name }}</button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
            @foreach ($galeri as $konten)
            <div class="gallery-item category-{{ $konten->aktivitas_id }} bg-gray-50 rounded-xl shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
            <div class="relative w-full h-56">
                <img src="{{ asset('storage/' . $konten->foto) }}" alt="{{ $konten->nama }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold text-dark-text mb-2">{{ $konten->nama }}</h3>
                <p class="text-sm text-gray-700">{{ $konten->deskripsi }}</p>
            </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="booking.html" class="bg-accent-light hover:bg-accent text-dark-text font-bold py-3 px-8 rounded-full focus:outline-none focus:ring-4 focus:ring-accent-light focus:ring-opacity-75 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="fas fa-calendar-alt mr-3"></i> Pesan Pengalaman Anda Sekarang!
            </a>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        const galleryGrid = document.getElementById('gallery-grid');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
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

        // Hero slider
        const sliderWrapper = document.getElementById('hero-slider-wrapper');
        const slides = document.querySelectorAll('.slider-slide');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        const dotsContainer = document.getElementById('slider-dots');

        let currentIndex = 0;
        const totalSlides = slides.length;

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
                dot.classList.toggle('active', idx === currentIndex);
            });
        }

        function goToSlide(index) {
            currentIndex = (index + totalSlides) % totalSlides;
            updateSlider();
        }

        prevButton.addEventListener('click', () => goToSlide(currentIndex - 1));
        nextButton.addEventListener('click', () => goToSlide(currentIndex + 1));

        updateSlider();
    });
</script>

@include('templates.footer')
