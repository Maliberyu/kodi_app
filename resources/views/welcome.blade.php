<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kodi.app - Belajar Seru untuk Generasi Digital</title>
    <meta name="description" content="Platform belajar interaktif penuh warna untuk anak dan remaja. Seru, modern, dan bikin ketagihan belajar!">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>
        :root {
            --cyan: #06b6d4;
            --fuchsia: #e879f9;
            --amber: #f59e0b;
            --purple: #a855f7;
            --pink: #ec4899;
        }
        .gradient-line { background: linear-gradient(90deg, #ffcb2d, #ff4dd2); height: 5px; }
        .gradient-text { background: linear-gradient(90deg, var(--cyan), var(--fuchsia)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .btn-primary { @apply px-10 py-4 bg-cyan-500 hover:bg-cyan-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-cyan-500/30 transform hover:scale-105 transition-all duration-300; }
        .btn-secondary { @apply px-10 py-4 bg-amber-400 hover:bg-amber-500 text-white font-bold rounded-2xl shadow-lg hover:shadow-amber-500/30 transform hover:scale-105 transition-all duration-300; }
    </style>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-pink-50 to-purple-50 min-h-screen flex flex-col font-sans antialiased">

    <!-- Navbar -->
    
    <nav class="bg-white/90 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="#" class="text-3xl font-black gradient-text">kodi.app</a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-10">
                <a href="#" class="text-gray-700 font-medium hover:text-cyan-600 transition">Beranda</a>
                <a href="#tentang-kami" class="text-gray-700 font-medium hover:text-cyan-600 transition">Tentang Kami</a>
                <a href="#kontak" class="text-gray-700 font-medium hover:text-cyan-600 transition">Kontak</a>
                <a href="{{ route('login') }}" class="px-6 py-2.5 bg-amber-400 hover:bg-amber-500 text-white font-bold rounded-xl shadow-md transition">
                    Masuk
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-btn" class="md:hidden text-3xl focus:outline-none">☰</button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <div class="px-6 py-4 space-y-4 text-center">
                <a href="#" class="block text-gray-700 font-medium hover:text-cyan-600">Beranda</a>
                <a href="#tentang-kami" class="block text-gray-700 font-medium hover:text-cyan-600">Tentang Kami</a>
                <a href="#kontak" class="block text-gray-700 font-medium hover:text-cyan-600">Kontak</a>
                <a href="{{ route('login') }}" class="block py-3 bg-amber-400 text-white font-bold rounded-xl">Masuk</a>
            </div>
        </div>
    </nav>

    <div class="gradient-line"></div>

    <!-- Hero Section -->
    <!-- Hero Section – Tombol sudah dibenerin & dibikin MANTAP -->
<section id="beranda" class="flex-1 flex flex-col items-center justify-center px-6 py-20 text-center">
    <dotlottie-wc
        src="https://lottie.host/eead6ccc-66c8-486b-8d9b-32f5d52cd2ed/mH8xK5Pov1.lottie"
        background="transparent"
        speed="0.9"
        style="width: 420px; height: 420px; max-width: 90vw;"
        autoplay loop hover>
    </dotlottie-wc>

    <h1 class="text-4xl md:text-6xl font-black gradient-text mt-12 mb-6 leading-tight">
        Selamat Datang di kodi.app
    </h1>
    <h1 class="text-4xl md:text-6xl font-black gradient-text mt-12 mb-6 leading-tight">
        
    </h1>
    <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto font-medium mb-16">
        Platform belajar interaktif yang bikin anak dan remaja jatuh cinta sama ilmu pengetahuan!
    </p>

    <!-- TOMBOL UTAMA – SEKARANG GEDE & GLOWING -->
    <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
        <!-- Masuk Sekarang -->
        <a href="{{ route('login') }}"
            class="group relative px-12 py-6 bg-cyan-500 hover:bg-cyan-600 text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-cyan-500/40 transform hover:scale-105 transition-all duration-300">
                Masuk Sekarang
            </a>

            <a href="{{ route('register') }}"
            class="group relative px-12 py-6 bg-amber-400 hover:bg-amber-500 text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-amber-500/40 transform hover:scale-105 transition-all duration-300">
                Daftar Gratis
            </a>
    </div>

    <p class="mt-mb-10 mt-12 text-gray-600 text-lg">
        Gratis selamanya • Tanpa kartu kredit
    </p>
</section>

    <!-- Tentang Kami -->
    <section id="tentang-kami" class="py-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-5xl md:text-6xl font-black gradient-text text-center mb-16">
                Tentang Kami
            </h2>

            <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Siapa Kami?</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        kodi.app adalah platform belajar daring yang lahir dari mimpi besar: membuat belajar jadi petualangan seru bagi generasi digital. Kami menggabungkan animasi keren, game, dan tantangan interaktif agar belajar nggak lagi terasa seperti "tugas".
                    </p>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Misi Kami</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Memberdayakan setiap anak dan remaja untuk menemukan cara belajar yang paling mereka suka. Kami ingin setiap "Aha!" moment terjadi setiap hari — bukan cuma saat ulangan.
                    </p>
                </div>
            </div>
       <!-- Judul Tim Praktisi -->
                <div class="text-center mb-12">
                    <!-- Jarak ke foto -->
                    <h3 class="text-4xl md:text-5xl font-black gradient-text mb-4">
                        Tim Praktisi Kami
                    </h3>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Belajar bersama guru-guru keren yang bikin pelajaran jadi petualangan seru!
                    </p>
                </div>

        <!-- 3 Foto Praktisi / Guru / Tim (Sejajar dalam Kotak) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-20">
            
            <!-- Praktisi 1 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-3">
                <div class="h-80 overflow-hidden">
                    <img src="https://yt3.googleusercontent.com/ytc/AIdro_mMYiqoBQ6lejSLo32Hd_Y7Sqke_7ZcYjb8MdOwBfn7UaQ=s160-c-k-c0x00ffffff-no-rj" 
                         alt="Bu Rina" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center bg-gradient-to-t from-cyan-50 to-transparent">
                    <h4 class="text-2xl font-bold text-gray-800">Risda Ayulia Apandi, Spd.</h4>
                    <p class="text-cyan-600 font-medium mt-1">Guru Koding </p>
                </div>
            </div>

            <!-- Praktisi 2 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-3">
                <div class="h-80 overflow-hidden">
                    <img src="https://scontent-cgk1-2.xx.fbcdn.net/v/t1.6435-1/99142016_2871274402994783_3312783901188947968_n.jpg?stp=dst-jpg_s320x320_tt6&_nc_cat=107&ccb=1-7&_nc_sid=fe59b0&_nc_eui2=AeGaLFa10okgCF4DjM2FOVDCT3aZ8j0Yhe9PdpnyPRiF70PgHOHscEw1igaaHtO4s9tU57xvpBzipZvThQ-hSmba&_nc_ohc=drst5uxEtgQQ7kNvwE4px4Z&_nc_oc=AdnkI5W4DdIttnaFoOPfEqM3t4vB-7sQb4CJGRckWORhIOtpuGOUnEnQ2SiFdvFrUdQ&_nc_zt=24&_nc_ht=scontent-cgk1-2.xx&_nc_gid=61pOBhnLhRtgzxXM5d__8g&oh=00_Afg1wk7az_oqFm0JmYvtQV-f-JJ2jBMWBscNNi4iQDb-vw&oe=6950911B" 
                         alt="Mas Fikri" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center bg-gradient-to-t from-purple-50 to-transparent">
                    <h4 class="text-2xl font-bold text-gray-800">Aris Sunandar, Amd.Kom.</h4>
                    <p class="text-purple-600 font-medium mt-1">Frontend Developer</p>
                </div>
            </div>

            <!-- Praktisi 3 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-3">
                <div class="h-80 overflow-hidden">
                    <img src="https://media.licdn.com/dms/image/v2/D4D03AQEi-urhlgET9w/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1698922272863?e=2147483647&v=beta&t=2cUkPsGqG_y0TVvhVCfQ6M-i1BH68m58Yuvr0167Ai4" 
                         alt="Kak Aisyah" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center bg-gradient-to-t from-amber-50 to-transparent">
                    <h4 class="text-2xl font-bold text-gray-800">Alwi Nurfaizi, S.Kom.</h4>
                    <p class="text-amber-600 font-medium mt-1">Backend Developer </p>
                </div>
            </div>

        </div>

   
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-2xl p-8 shadow-md">
                    <div class="text-5xl font-black text-cyan-600">10K+</div>
                    <p class="text-gray-700 font-medium mt-3">Pengguna Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-fuchsia-50 to-fuchsia-100 rounded-2xl p-8 shadow-md">
                    <div class="text-5xl font-black text-fuchsia-600">500+</div>
                    <p class="text-gray-700 font-medium mt-3">Materi Seru</p>
                </div>
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-8 shadow-md">
                    <div class="text-5xl font-black text-amber-600">50+</div>
                    <p class="text-gray-700 font-medium mt-3">Kelas Interaktif</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 shadow-md">
                    <div class="text-5xl font-black text-purple-600">24/7</div>
                    <p class="text-gray-700 font-medium mt-3">Belajar Kapan Saja</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-24 px-6 bg-gradient-to-r from-cyan-500 to-fuchsia-600 text-white">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-5xl md:text-6xl font-black mb-8">Punya Pertanyaan?</h2>
            <p class="text-xl md:text-2xl mb-16 max-w-3xl mx-auto opacity-90">
                Saran, kritik, atau mau kerja sama? Tim kodi.app selalu senang dengar kabar dari kamu!
            </p>

            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition">
                    <div class="text-5xl mb-4">Email</div>
                    <p class="text-2xl font-bold">halo@kodi.app</p>
                </div>
                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition">
                    <div class="text-5xl mb-4">Halaman WhatsApp</div>
                    <p class="text-2xl font-bold">Kodi.app</p>
                </div>
                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition">
                    <div class="text-5xl mb-4">Instagram</div>
                    <p class="text-2xl font-bold">@kodi.app</p>
                </div>
            </div>

            <a href="mailto:halo@kodi.app" class="inline-block px-14 py-6 bg-white text-cyan-600 hover:bg-gray-100 text-2xl font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                Kirim Pesan Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-2xl font-bold mb-2 gradient-text">kodi.app</p>
            <p class="text-gray-400">© 2025 kodi.app — Dibuat dengan cinta untuk generasi petualang digital</p>
        </div>
    </footer>

    <!-- Mobile Menu Script (hanya 10 baris) -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    <!-- Lottie Web Component -->
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</body>
</html>