<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Beranda - CampHarmoni</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/tailwind.config.js"></script> 
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body class="font-body">
    @php
        $currentRoute = Route::currentRouteName();
    @endphp

    <a href="#main-content" class="skip-link sr-only focus:not-sr-only">Lewati ke Konten Utama</a>

    
<!-- NAVBAR -->
    <div class="navbar-container mb-10 pb-10">
        <nav class="flex justify-between items-center text-navbar-text p-4 md:p-0 mb-10 pb-10">
            <div class="text-2xl md:text-3xl font-bold font-hero tracking-wider">Camp Harmoni</div>
            
            <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none" aria-label="Toggle mobile menu">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            
           <a href="{{route('homepage')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'homepage' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Beranda
            </a>

            <a href="{{route('booking')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'booking' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Pesan
            </a>

            <a href="{{route('tenda.user')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'tenda.user' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Tenda
            </a>

            <a href="{{route('gallery')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'gallery' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Gallery
            </a>

            <a href="{{route('review')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'review' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Ulasan
            </a>

            <a href="{{route('about')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'about' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            Tentang Kami
            </a>

            @auth
            <a href="{{route('booking.history')}}"
            class="nav-link transition duration-300 {{ $currentRoute === 'booking.history' ? 'font-semibold text-primary border-b-2 border-primary pb-1' : '' }}">
            History Pesanan
            </a>
            @endauth

            @guest
            <a href="{{route('login')}}" class="hidden md:block bg-primary hover:bg-primary-dark text-white px-6 py-2 md:px-8 md:py-3 rounded-full font-medium tracking-wide transition-all duration-300 transform hover:scale-105 shadow-lg">
                Sign In
            </a>
            @endguest


            @auth
    <!-- Dropdown user untuk user yang login -->
                <div class="relative hidden md:block">
                    <button id="userDropdownBtn" class="flex items-center space-x-2 bg-primary text-white px-4 py-2 rounded-full focus:outline-none hover:bg-primary-dark">
                        <span class="whitespace-nowrap overflow-hidden text-ellipsis max-w-[60px] block">{{ \Illuminate\Support\Str::words(Auth::user()->name,2,'...')}}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <!-- Dropdown content -->
                    <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg py-2 hidden z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>

                         @if (Auth::check() && (Auth::user()->role === 'admin'))
                         <a href="{{ route('adminDashboard') }}" class="block px-4 py-2 text-white py-2 bg-blue-500 hover:bg-blue-400">Admin</a>
                         @endif

                         @if (Auth::check() && (Auth::user()->role === 'owner'))
                         <a href="{{ route('owner.bookings') }}" class="block px-4 text-white py-2 bg-blue-500 hover:bg-blue-400">History Print</a>
                         @endif

                        <!-- Logout form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-white bg-red-500 hover:bg-red-400">Logout</button>
                        </form>
                       
                    </div>
                </div>
            @endauth
            <!-- Hapus tombol Sign up yang di luar -->
        </nav>

        <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-70 z-40 hidden md:hidden"></div>

        <div id="mobile-menu-drawer" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden">
            <div class="flex justify-end p-4">
                <button id="close-mobile-menu" class="text-gray-700 focus:outline-none" aria-label="Close mobile menu">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <nav class="flex flex-col items-start p-6 space-y-4">
                <a href="{{route('homepage')}}" class="nav-link text-xl text-gray-800 hover:text-primary transition duration-300 w-full py-2">Beranda</a> 
                <a href="{{route('booking')}}" class="nav-link text-xl text-gray-800 hover:text-primary transition duration-300 w-full py-2">Pesan</a>
                <a href="{{route('gallery')}}" class="nav-link text-xl text-gray-800 hover:text-primary transition duration-300 w-full py-2">Gallery</a>
                <a href="{{ route('review') }}" class="nav-link text-xl text-gray-800 hover:text-primary transition duration-300 w-full py-2">Ulasan</a>
                <a href="{{route('about')}}" class="nav-link text-xl text-gray-800 hover:text-primary transition duration-300 w-full py-2">Tentang Kami</a>
                 @guest
    <a href="{{route('login')}}" class="block md:hidden bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full font-medium tracking-wide transition-all duration-300 transform hover:scale-105 shadow-lg w-full text-center">
        Sign up
    </a>
@endguest

@auth
    <div class="block md:hidden w-full mt-4">
        <div class="bg-primary text-white px-4 py-3 rounded-lg flex items-center justify-between">
            <span class="font-semibold text-sm truncate">{{ \Illuminate\Support\Str::words(Auth::user()->name, 2, '...') }}</span>
        </div>
        <div class="bg-white mt-2 rounded-lg shadow-md">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            @if (Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('adminDashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white bg-red-600">Logout</button>
            </form>
        </div>
    </div>
@endauth
            </nav>
        </div>
    </div>
    <!-- END NAVBAR -->



    

