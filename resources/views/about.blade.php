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

            
        </div>
    </main>

@include('templates.footer')