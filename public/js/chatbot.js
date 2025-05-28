document.addEventListener('DOMContentLoaded', () => {
    const chatbotContainer = document.getElementById('chatbotContainer'); // Pastikan ID ini ada di HTML, saya akan pakai ID yang ada di HTML
    const chatbotMessages = document.getElementById('chatbotMessages');
    const userInput = document.getElementById('userInput');
    const sendMessageBtn = document.getElementById('sendMessage');
    const openChatbotBtn = document.getElementById('openChatbotBtn');
    const closeChatbotBtn = document.getElementById('closeChatbot');

    // Mengambil elemen chatbotContainer dari HTML
    const mainChatbotContainer = document.querySelector('.chatbot-container');

    // --- Fungsi Utilitas ---
    function addMessage(sender, message) {
        const messageBubble = document.createElement('div');
        messageBubble.classList.add('message-bubble', sender);
        messageBubble.textContent = message;
        chatbotMessages.appendChild(messageBubble);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Auto-scroll ke bawah
    }

    function generateBotResponse(userMessage) {
        const msg = userMessage.toLowerCase().trim();

        // --- Respon untuk Memulai Chat ---
        if (msg === "halo" || msg === "hi" || msg === "mulai" || msg === "sapa") {
            return "Halo! Saya asisten virtual [Nama Bisnis Anda]. Saya bisa membantu Anda dengan informasi produk, harga, dan layanan. Anda bisa memulai dengan mengetik: 'Harga [Nama Produk]', 'Daftar Produk', 'Layanan', atau 'Bantuan'.";
        } else if (msg === "bantuan") {
            return "Tentu, saya bisa membantu Anda dengan informasi harga, detail produk, cara pemesanan, atau info kontak. Coba ketik 'Harga', 'Produk', atau 'Kontak'.";
        } else if (msg === "menu") {
            return "Pilih opsi di bawah ini:\n- Harga Produk\n- Daftar Produk\n- Info Layanan\n- Kontak Kami\n- Promo"; // Menambahkan 'Promo'
        }

        // --- Penanganan Kata Kunci 'Harga' ---
        if (msg.startsWith("harga ")) {
            const productName = msg.replace("harga ", "").trim();
            if (productName) {
                if (productName.includes("sepatu a")) {
                    return "Harga Sepatu A adalah Rp 500.000.";
                } else if (productName.includes("kaos b")) {
                    return "Harga Kaos B adalah Rp 150.000.";
                } else if (productName.includes("layanan premium")) {
                    return "Harga Layanan Premium dimulai dari Rp 1.000.000 per bulan.";
                } else {
                    return `Maaf, saya tidak menemukan harga untuk '${productName}'. Mohon sebutkan nama produk atau layanan dengan lebih spesifik, atau ketik 'Daftar Produk'.`;
                }
            } else {
                return "Anda ingin menanyakan harga apa? Coba ketik 'Harga [Nama Produk]'."
            }
        }

        // --- Penanganan Kata Kunci 'Daftar Produk' atau 'Produk' ---
        if (msg === "daftar produk" || msg === "produk") {
            return "Kami memiliki:\n- Sepatu A\n- Kaos B\n- Celana C\n- Layanan Premium\nUntuk detail atau harga, ketik 'Harga [Nama Produk]'.";
        }

        // --- Penanganan Kata Kunci 'Layanan' atau 'Info Layanan' ---
        if (msg === "layanan" || msg === "info layanan") {
            return "Kami menyediakan layanan berikut: [Daftar Layanan Anda seperti Jasa Desain Web, Konsultasi Digital Marketing]. Untuk info lebih lanjut, ketik 'Detail Layanan [Nama Layanan]'.";
        }

        // --- Penanganan Kata Kunci 'Kontak' atau 'Info Kontak' ---
        if (msg === "kontak" || msg === "info kontak") {
            return "Anda bisa menghubungi kami di nomor telepon 0812-3456-7890 atau email support@namabisnis.com. Jam kerja: Senin-Jumat, 09:00-17:00 WITA.";
        }
        
        // --- Penanganan Kata Kunci 'Promo' ---
        if (msg === "promo" || msg === "promosi") {
            return "Saat ini kami sedang ada promo spesial diskon 10% untuk pembelian Sepatu A hingga akhir bulan! Jangan lewatkan!";
        }

        // --- Pesan Default jika tidak mengerti ---
        return "Maaf, saya tidak mengerti perintah Anda. Coba ketik 'Bantuan' atau 'Menu' untuk melihat apa yang bisa saya lakukan.";
    }

    // --- Event Listeners ---
    sendMessageBtn.addEventListener('click', () => {
        const userMessage = userInput.value;
        if (userMessage.trim() === '') return; // Jangan kirim pesan kosong

        addMessage('user', userMessage);
        userInput.value = ''; // Kosongkan input

        // Simulasikan bot sedang mengetik atau berpikir
        setTimeout(() => {
            const botResponse = generateBotResponse(userMessage);
            addMessage('bot', botResponse);
        }, 500); // Respon bot setelah 0.5 detik
    });

    userInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessageBtn.click(); // Tekan tombol kirim jika Enter ditekan
        }
    });

    // --- Fungsi untuk membuka/menutup chatbot ---
    openChatbotBtn.addEventListener('click', () => {
        mainChatbotContainer.classList.add('active');
        addMessage('bot', generateBotResponse("halo")); // Kirim pesan selamat datang saat dibuka
    });

    closeChatbotBtn.addEventListener('click', () => {
        mainChatbotContainer.classList.remove('active');
        // Opsional: Kosongkan pesan saat ditutup
        // chatbotMessages.innerHTML = '';
    });

    // Inisialisasi: Tampilkan pesan selamat datang saat halaman dimuat (jika chatbot langsung aktif)
    // Atau hanya saat tombol open di klik
    // addMessage('bot', generateBotResponse("halo"));
});