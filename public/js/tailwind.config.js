// tailwind.config.js
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#A85A48', // Contoh warna dasar
                'primary-dark': '#8D473A', // Warna primer yang lebih gelap untuk hover
                'dark-text': '#333333',     // Warna teks gelap
                'navbar-text': '#000000',   // <--- UBAH INI MENJADI HITAM (#000000)
                'gold-accent': '#FFD700',   // Aksen warna emas
                'book-now-green': '#4CAF50', // Warna hijau untuk tombol book now
                'light-gray-bg': '#F8F8F8'  // Warna abu-abu terang untuk bagian latar belakang
            },
            fontFamily: {
                hero: ['Playfair Display', 'serif'],
                body: ['Montserrat', 'sans-serif'],
            },
            animation: {
                'fade-in': 'fadeIn 1.5s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                }
            }
        },
    },
};