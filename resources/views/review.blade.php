@include('templates.navbar')
    <main id="main-content">
        <div class="p-2 pt-10 mt-10">
            <section class="py-10 bg-light-gray-bg rounded-xl shadow-lg mt-2 max-w-6xl mx-auto p-8">
                <h2 class="text-3xl font-bold font-hero text-dark-text text-center mb-2">Ulasan dari Pengunjung Kami</h2>
                <p class="text-xl opacity-90 animate-fade-in text-center mb-10">Dengar langsung pengalaman tak terlupakan dari mereka yang telah berkemah bersama kami.</p>
                
            @foreach ($ulasans as $index => $ulasan)
                <div class="review-item review-card bg-white mt-4 p-8 rounded-xl shadow-lg text-left hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 {{ $index >= 2 ? 'hidden' : '' }}">
                    <div class="flex items-center mb-4">
                        
                        <div>
                            <h4 class="text-xl font-semibold text-dark-text">{{ $ulasan->booking->nama }}</h4>
                            <div class="text-gold-accent text-lg ">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $ulasan->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"{{ $ulasan->komentar }}"</p>
                    <p class="text-gray-500 text-sm">{{ $ulasan->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
                <div class="mt-16 text-center">
                    <button id="toggle-review-btn" onclick="toggleReview()" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-full font-medium transition-all duration-300 shadow-md">
                        Selengkapnya
                    </button>
                </div>
            </section>
        </div>
    </main>

    

    @include('templates.footer')
<script>
let expanded = false;

function toggleReview() {
    const allItems = document.querySelectorAll('.review-item');
    const button = document.getElementById('toggle-review-btn');

    if (!expanded) {
        allItems.forEach((item, index) => {
            if (index >= 2) {
                item.classList.remove('hidden');
            }
        });
        button.textContent = 'Perdikit';
        expanded = true;
    } else {
        allItems.forEach((item, index) => {
            if (index >= 2) {
                item.classList.add('hidden');
            }
        });
        button.textContent = 'Selengkapnya';
        expanded = false;
    }
}
</script>



