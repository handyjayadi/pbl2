
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../images/camping-hero.jpg'); /* Ganti dengan URL gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.2); /* Warna putih transparan */
            backdrop-filter: blur(10px); /* Efek blur */
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3); 
        }
    </style>
</head>
<body class="font-sans">

    <div class="glass-container p-8 md:p-12 w-11/12 max-w-md mx-auto text-white shadow-lg">
        <h2 class="text-3xl font-bold text-center mb-8">Register</h2>

        <form method="POST" action="{{ route('register') }}">
        @csrf
                    
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <div class="mb-6">
                <label for="name" class="block text-lg mb-2 opacity-80">Name</label>
                <input type="text" id="name" name="name" :value="old('name')" class="w-full p-3 bg-transparent border-b-2 border-white focus:outline-none focus:border-opacity-100 placeholder-white placeholder-opacity-70 text-lg" placeholder="Choose a name">
            </div>
            @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
            <div class="mb-6">
                <label for="email" class="block text-lg mb-2 opacity-80">Email</label>
                <input type="email" id="email" name="email" :value="old('email')"class="w-full p-3 bg-transparent border-b-2 border-white focus:outline-none focus:border-opacity-100 placeholder-white placeholder-opacity-70 text-lg" placeholder="your@example.com">
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-lg mb-2 opacity-80">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 bg-transparent border-b-2 border-white focus:outline-none focus:border-opacity-100 placeholder-white placeholder-opacity-70 text-lg pr-10" placeholder="******">
                <span class="absolute inset-y-0 right-0 top-7 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('password')">
                    <svg id="eye-open-password" class="h-6 w-6 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <svg id="eye-closed-password" class="h-6 w-6 text-white opacity-70 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .989-3.155 3.527-5.617 6.643-6.843m-.96-1.042A9.954 9.954 0 0112 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7a9.954 9.954 0 01-2.617-.384M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                    </svg>
                </span>
            </div>

            <div class="mb-8 relative">
                <label for="confirm-password" class="block text-lg mb-2 opacity-80">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" class="w-full p-3 bg-transparent border-b-2 border-white focus:outline-none focus:border-opacity-100 placeholder-white placeholder-opacity-70 text-lg pr-10" placeholder="******">
                <span class="absolute inset-y-0 right-0 top-7 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('confirm-password')">
                    <svg id="eye-open-confirm-password" class="h-6 w-6 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <svg id="eye-closed-confirm-password" class="h-6 w-6 text-white opacity-70 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .989-3.155 3.527-5.617 6.643-6.843m-.96-1.042A9.954 9.954 0 0112 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7a9.954 9.954 0 01-2.617-.384M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                    </svg>
                </span>
            </div>
            <!-- Tambahkan ini sebelum tombol Register -->
            <input type="hidden" name="role" value="user">
            <button type="submit" class="w-full bg-white text-purple-800 font-bold py-3 rounded-full hover:bg-opacity-90 transition duration-300 text-lg">
                Register
            </button>

        </form>

        <p class="text-center mt-8 text-white text-sm md:text-base opacity-80">
            Already have an account? <a href="{{ route("login") }}" class="text-white hover:underline font-semibold">Login</a>
        </p>
    </div>

    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeOpen = document.getElementById(`eye-open-${fieldId}`);
            const eyeClosed = document.getElementById(`eye-closed-${fieldId}`);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordField.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

</body>
</html>