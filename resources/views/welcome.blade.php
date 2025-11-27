<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kodi.app</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css'])
    <style>
        .gradient-line { background: linear-gradient(to right, #ffcb2d, #ff4dd2); height: 4px; }
    </style>
</head>

<body class="bg-gradient-to-br from-yellow-100 via-pink-100 to-purple-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg px-6 py-4 z-50 relative">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-fuchsia-500">
                kodi.app
            </div>
            <div class="hidden md:flex space-x-8 text-gray-700 font-medium">
                <a href="#" class="hover:text-cyan-500">Beranda</a>
                <a href="#" class="hover:text-cyan-500">Kontak</a>
                <a href="#" class="hover:text-cyan-500">Tentang Kami</a>
            </div>
            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-amber-400 hover:bg-amber-500 text-white rounded-lg font-bold shadow-lg transition-all">
                Masuk
            </a>
        </div>
    </nav>

    <div class="gradient-line"></div>

    <!-- HERO: Robot di atas, teks di bawah -->
    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12 gap-10">

        <!-- ROBOT DI ATAS (ukuran gede tapi tetap responsif) -->
        <dotlottie-wc
            src="https://lottie.host/eead6ccc-66c8-486b-8d9b-32f5d52cd2ed/mH8xK5Pov1.lottie"
            background="transparent"
            speed="0.9"
            style="width: 420px; height: 420px; max-width: 90vw;"
            autoplay
            loop
            hover
        ></dotlottie-wc>

        <!-- TEXT HERO -->
        <div class="text-center max-w-3xl">
            <h1 class="text-5xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-fuchsia-500 mb-6 leading-tight">
                Selamat Datang di kodi.app
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-10 font-medium">
                Platform belajar interaktif untuk generasi petualang digital.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('login') }}"
                   class="px-10 py-5 bg-cyan-500 hover:bg-cyan-600 text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-cyan-500/50 transform hover:scale-105 transition-all">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="px-10 py-5 bg-amber-400 hover:bg-amber-500 text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-amber-500/50 transform hover:scale-105 transition-all">
                    Daftar Gratis
                </a>
            </div>
        </div>
    </div>

    <!-- Load dotlottie-wc -->
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</body>
</html>