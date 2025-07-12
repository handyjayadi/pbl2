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
            <div class="slider-slide" style="background-image: url('../images/gngbtr.jpg');">
                <div class="slider-overlay"></div>
                <div class="slider-content">
                    <h1 class="text-5xl md:text-6xl font-bold font-hero mb-4 animate-fade-in drop-shadow-md">Abadikan Momen, Rasakan Petualangan</h1>
                    <p class="text-xl md:text-2xl opacity-90 animate-fade-in drop-shadow-md">Temukan keindahan CampHarmoni melalui galeri foto kami dan rencanakan petualangan Anda dengan beragam aktivitas.</p>
                </div>
            </div>                                                                                  
        </div>

        
    </section>

    <!-- FILTER & GALERI -->
     <section class="py-16 bg-white rounded-2xl shadow-xl mt-12 max-w-7xl mx-auto p-8 md:p-12 border border-gray-100">
        <h2 class="text-4xl font-bold font-hero text-dark-text text-center mb-12">Aktivitas Seru di CampHarmoni</h2>

        <!-- Tombol Filter -->
        <div class="flex flex-wrap gap-2 justify-center mb-8">
            <button class="filter-btn bg-primary text-white px-4 py-2 rounded" data-filter="all">Semua</button>
            @foreach ($aktivitas as $kat)
                <button class="filter-btn bg-gray-200 text-gray-800 px-4 py-2 rounded" data-filter="{{ $kat->id }}">{{ $kat->name }}</button>
            @endforeach
        </div>

        <!-- Galeri Scroll Horizontal -->
        <div class="overflow-x-auto w-full">
            <div class="flex gap-6 w-max" id="gallery-grid">
                @foreach ($galeri as $konten)
                <div class="gallery-item category-{{ $konten->aktivitas_id }} bg-white rounded-xl shadow-md overflow-hidden flex-shrink-0 w-72 mb-6">
                    <div class="aspect-[4/3] w-full">
                        <img src="{{ asset('storage/' . $konten->foto) }}" alt="{{ $konten->nama }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-dark-text mb-2">{{ $konten->nama }}</h3>
                        <p class="text-sm text-gray-700">
                            {{ Str::words($konten->deskripsi, 15, '...') }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
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
                // Ganti tampilan tombol
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });
                this.classList.remove('bg-gray-200', 'text-gray-800');
                this.classList.add('bg-primary', 'text-white');

                const filter = this.dataset.filter;
                galleryItems.forEach(item => {
                    if (filter === 'all' || item.classList.contains('category-' + filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>



@include('templates.footer')
