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
        Sedikit belajar hari ini, banyak manfaat di kemudian hari.
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
        <div class="text-center mb-14">
            <p class="text-sm font-bold tracking-widest text-cyan-500 uppercase mb-3">The Future Leader</p>
            <h3 class="text-4xl md:text-5xl font-black gradient-text mb-4">
                Tim Praktisi Kami
            </h3>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Belajar bersama para praktisi keren yang mendedikasikan ilmunya untuk generasi digital!
            </p>
        </div>

        <!-- Baris 1: Bu Risda (featured, centered, lebih besar) -->
        <div class="flex justify-center mb-20">
            <a href="/kodi_app/public/profile/bu-Risda" class="block group w-full max-w-sm">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transition-all duration-300 group-hover:shadow-cyan-200 group-hover:-translate-y-4"
                     style="box-shadow:0 25px 60px -12px rgba(6,182,212,.25)">

                    <!-- Crown badge -->
                    <div class="relative">
                        <div class="h-96 overflow-hidden">
                            <img src="{{ asset('storage/poto.jpeg') }}"
                                 alt="Bu Risda"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                        </div>
                        <!-- Leader badge -->
                        <div class="absolute top-4 left-1/2 -translate-x-1/2">
                            <span class="px-4 py-1.5 text-xs font-black rounded-full text-white tracking-widest"
                                  style="background:linear-gradient(135deg,#06b6d4,#a855f7);box-shadow:0 4px 15px -3px rgba(6,182,212,.5)">
                                ★ THE LEADER
                            </span>
                        </div>
                    </div>

                    <div class="p-7 text-center" style="background:linear-gradient(180deg,#ecfeff,white)">
                        <h4 class="text-2xl font-black text-gray-800">Risda Ayulia Apandi, S.Pd.</h4>
                        <p class="font-bold mt-1" style="color:#06b6d4">Guru Koding</p>
                        <p class="text-sm text-gray-500 mt-1">Pendidik & Inisiator kodi.app</p>
                        <span class="inline-block mt-4 px-5 py-2 text-sm font-bold rounded-full text-white transition"
                              style="background:linear-gradient(135deg,#06b6d4,#a855f7)">
                            Lihat Portofolio →
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pemisah & label Tim Pengembang -->
        <div class="flex items-center gap-4 max-w-2xl mx-auto mb-10 px-4">
            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#e2e8f0)"></div>
            <p class="text-xs font-bold tracking-widest uppercase text-gray-400 whitespace-nowrap">Tim Pengembang</p>
            <!-- <p class="text-xs font-bold tracking-widest uppercase text-gray-400 whitespace-nowrap">---------------</p> -->
            <div class="flex-1 h-px" style="background:linear-gradient(90deg,#e2e8f0,transparent)"></div>
        </div>

        <!-- Baris 2: Aris & Alwi (tim, lebih kecil, 2 kolom) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-2xl mx-auto mb-20 px-4 md:px-0">

            <!-- Aris -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-3">
                <div class="h-64 overflow-hidden">
                    <img src="https://avatars.githubusercontent.com/u/219940777?v=4"
                         alt="Aris Sunandar"
                         class="w-full h-full object-cover">
                </div>
                <div class="p-5 text-center" style="background:linear-gradient(180deg,#faf5ff,white)">
                    <h4 class="text-lg font-bold text-gray-800">Aris Sunandar, Amd.Kom.</h4>
                    <p class="font-semibold mt-1 text-sm" style="color:#9333ea">Frontend Developer</p>
                </div>
            </div>

            <!-- Alwi -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-3">
                <div class="h-64 overflow-hidden">
                    <img src="https://media.licdn.com/dms/image/v2/D5603AQHebX5W-ckZoQ/profile-displayphoto-scale_200_200/B56ZwETLRtKsAY-/0/1769598662550?e=2147483647&v=beta&t=fJOX3_iINZkHdIk2ihjHMR75in6j-c9vmvaoqTwb3Mc"
                         alt="Alwi Nurfaizi"
                         class="w-full h-full object-cover">
                </div>
                <div class="p-5 text-center" style="background:linear-gradient(180deg,#fffbeb,white)">
                    <h4 class="text-lg font-bold text-gray-800">Alwi Nurfaizi, S.Kom.</h4>
                    <p class="font-semibold mt-1 text-sm" style="color:#d97706">Backend Developer</p>
                </div>
            </div>

        </div>

            {{-- ===== PORTAL MASUK ===== --}}
            <div style="margin-top:5rem;margin-bottom:4rem">
                <div class="text-center mb-12">
                    <h3 class="text-4xl md:text-5xl font-black gradient-text mb-4">
                        Masuk ke Portal
                    </h3>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Pilih portal sesuai peranmu dan mulai petualangan belajar!
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

                    {{-- Portal Guru --}}
                    <div class="rounded-3xl overflow-hidden shadow-xl" style="box-shadow:0 20px 50px -12px rgba(99,102,241,.25)">
                        <div class="p-8 text-white text-center"
                             style="background:linear-gradient(135deg,#6366f1,#7c3aed,#9333ea)">
                            <div class="text-6xl mb-3">🎓</div>
                            <h4 class="text-2xl font-black">Portal Guru</h4>
                            <p class="text-sm mt-2" style="color:rgba(224,231,255,1)">
                                Kelola kelas & pantau perkembangan siswa
                            </p>
                        </div>
                        <div class="p-6 bg-white">
                            <ul class="space-y-3 mb-6">
                                @foreach([['📚','Buat & kelola E-Modul'],['🎯','Buat soal kuis interaktif'],['🛠️','Nilai proyek siswa'],['🏆','Pantau ranking & progress']] as [$ico,$txt])
                                <li class="flex items-center gap-3 text-gray-700 text-sm font-medium">
                                    <span class="w-8 h-8 rounded-xl flex items-center justify-center text-sm flex-shrink-0"
                                          style="background:linear-gradient(135deg,#6366f1,#7c3aed)">{{ $ico }}</span>
                                    {{ $txt }}
                                </li>
                                @endforeach
                            </ul>
                            <div class="flex gap-3">
                                <a href="{{ route('demo.guru') }}"
                                   class="flex-1 py-3 text-center text-sm font-bold rounded-2xl transition"
                                   style="background:#eef2ff;color:#6366f1">
                                        Lihat Demo
                                </a>
                                @if(auth()->check() && auth()->user()->isGuru())
                                    <a href="{{ route('guru.home') }}"
                                       class="flex-1 py-3 text-center text-white text-sm font-bold rounded-2xl"
                                       style="background:linear-gradient(135deg,#6366f1,#7c3aed)">🚀 Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="flex-1 py-3 text-center text-white text-sm font-bold rounded-2xl"
                                       style="background:linear-gradient(135deg,#6366f1,#7c3aed)"> Login</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Portal Murid --}}
                    <div class="rounded-3xl overflow-hidden shadow-xl" style="box-shadow:0 20px 50px -12px rgba(249,115,22,.25)">
                        <div class="p-8 text-white text-center"
                             style="background:linear-gradient(135deg,#f97316,#ec4899,#a855f7)">
                            <div class="text-6xl mb-3">🧑‍💻</div>
                            <h4 class="text-2xl font-black">Portal Murid</h4>
                            <p class="text-sm mt-2" style="color:rgba(255,237,213,1)">
                                Belajar seru, kumpulkan poin & raih juara!
                            </p>
                        </div>
                        <div class="p-6 bg-white">
                            <ul class="space-y-3 mb-6">
                                @foreach([['📖','Pelajari E-Modul seru'],['🎮','Kerjakan kuis & tantangan'],['⚡','Coding di Block Playground'],['🏆','Bersaing di papan ranking']] as [$ico,$txt])
                                <li class="flex items-center gap-3 text-gray-700 text-sm font-medium">
                                    <span class="w-8 h-8 rounded-xl flex items-center justify-center text-sm flex-shrink-0"
                                          style="background:linear-gradient(135deg,#f97316,#ec4899)">{{ $ico }}</span>
                                    {{ $txt }}
                                </li>
                                @endforeach
                            </ul>
                            <div class="flex gap-3">
                                <a href="{{ route('demo.siswa') }}"
                                   class="flex-1 py-3 text-center text-sm font-bold rounded-2xl transition"
                                   style="background:#fff7ed;color:#f97316">
                                     Lihat Demo
                                </a>
                                @if(auth()->check() && auth()->user()->isSiswa())
                                    <a href="{{ route('siswa.home') }}"
                                       class="flex-1 py-3 text-center text-white text-sm font-bold rounded-2xl"
                                       style="background:linear-gradient(135deg,#f97316,#ec4899)">🚀 Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="flex-1 py-3 text-center text-white text-sm font-bold rounded-2xl"
                                       style="background:linear-gradient(135deg,#f97316,#ec4899)"> Login</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ===== END PORTAL ===== --}}

            <!-- Stats -->
            <!-- <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
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
            </div> -->
        </div>
    </section>

    <!-- ===== KONTAK ===== -->
    <section id="kontak" style="background:#0f172a;padding:96px 24px">
        <div style="max-width:1100px;margin:0 auto">

            {{-- Header --}}
            <div style="text-align:center;margin-bottom:64px">
                <p style="font-size:12px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:#06b6d4;margin-bottom:12px">
                    Hubungi Kami
                </p>
                <h2 style="font-size:clamp(2rem,5vw,3.5rem);font-weight:900;color:white;margin-bottom:16px;line-height:1.15">
                    Punya Pertanyaan?
                </h2>
                <p style="font-size:18px;color:#94a3b8;max-width:560px;margin:0 auto;line-height:1.7">
                    Saran, kritik, atau ingin berkolaborasi? Tim kodi.app selalu terbuka dan siap merespons dengan sepenuh hati.
                </p>
            </div>

            {{-- 3 Kontak Cards --}}
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-bottom:56px">

                {{-- Email --}}
                <div style="background:#1e293b;border:1px solid #334155;border-radius:20px;padding:28px 24px;display:flex;align-items:flex-start;gap:18px;transition:border-color .2s"
                     onmouseenter="this.style.borderColor='#06b6d4'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width:48px;height:48px;border-radius:14px;background:rgba(6,182,212,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                        <svg width="22" height="22" fill="none" stroke="#06b6d4" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size:12px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px">Email</p>
                        <p style="font-size:16px;font-weight:700;color:white">maliberyu@gmail.com</p>
                        <p style="font-size:13px;color:#64748b;margin-top:4px">Respons dalam 1×24 jam</p>
                    </div>
                </div>

                {{-- Instagram --}}
                <div style="background:#1e293b;border:1px solid #334155;border-radius:20px;padding:28px 24px;display:flex;align-items:flex-start;gap:18px"
                     onmouseenter="this.style.borderColor='#e879f9'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width:48px;height:48px;border-radius:14px;background:rgba(232,121,249,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                        <svg width="22" height="22" fill="none" stroke="#e879f9" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="#e879f9" stroke="none"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size:12px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px">Instagram</p>
                        <p style="font-size:16px;font-weight:700;color:white">@kodi.app</p>
                        <p style="font-size:13px;color:#64748b;margin-top:4px">Update & konten terbaru</p>
                    </div>
                </div>

                {{-- WhatsApp --}}
                <a href="https://whatsapp.com/channel/0029Vay0hFn2v1IrMtLECk0M"
                   style="background:#1e293b;border:1px solid #334155;border-radius:20px;padding:28px 24px;display:flex;align-items:flex-start;gap:18px;text-decoration:none"
                   onmouseenter="this.style.borderColor='#22c55e'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width:48px;height:48px;border-radius:14px;background:rgba(34,197,94,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="#22c55e">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size:12px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px">WhatsApp Channel</p>
                        <p style="font-size:16px;font-weight:700;color:white">kodi.app Official</p>
                        <p style="font-size:13px;color:#22c55e;margin-top:4px;font-weight:600">Klik untuk bergabung →</p>
                    </div>
                </a>

            </div>

            {{-- Divider --}}
            <div style="height:1px;background:linear-gradient(90deg,transparent,#334155,transparent);margin-bottom:48px"></div>

            {{-- Mission Statement --}}
            <div style="text-align:center">
                <p style="font-size:15px;color:#475569;max-width:640px;margin:0 auto;line-height:1.8;font-style:italic">
                    "Kami percaya bahwa setiap anak berhak mendapatkan pendidikan yang menyenangkan, bermakna, dan relevan dengan masa depan. kodi.app hadir sebagai jembatan antara teknologi dan semangat belajar."
                </p>
                <p style="font-size:13px;color:#334155;margin-top:16px;font-weight:700">— Tim kodi.app</p>
            </div>

        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer style="background:#020617;padding:64px 24px 0">
        <div style="max-width:1100px;margin:0 auto">

            {{-- Top grid --}}
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:48px;padding-bottom:56px;border-bottom:1px solid #1e293b">

                {{-- Brand --}}
                <div>
                    <p style="font-size:28px;font-weight:900;background:linear-gradient(90deg,#06b6d4,#e879f9);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-bottom:12px">
                        kodi.app
                    </p>
                    <p style="font-size:14px;color:#64748b;line-height:1.7;max-width:240px">
                        Platform belajar koding interaktif untuk generasi digital Indonesia yang penuh semangat.
                    </p>
                    <div style="display:flex;gap:8px;margin-top:20px;flex-wrap:wrap">
                        <span style="font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;background:#1e293b;color:#06b6d4;border:1px solid #334155">Laravel</span>
                        <span style="font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;background:#1e293b;color:#a855f7;border:1px solid #334155">Tailwind</span>
                        <span style="font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;background:#1e293b;color:#f59e0b;border:1px solid #334155">Alpine.js</span>
                    </div>
                </div>

                {{-- Navigasi --}}
                <div>
                    <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#475569;margin-bottom:20px">Navigasi</p>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:12px">
                        @foreach([['#','Beranda'],['#tentang-kami','Tentang Kami'],['#kontak','Kontak'],['','Portal Guru'],['','Portal Murid']] as [$href,$label])
                        <li>
                            <a href="{{ $href ?: route('login') }}"
                               style="font-size:14px;color:#64748b;text-decoration:none;transition:color .15s"
                               onmouseenter="this.style.color='#e2e8f0'" onmouseleave="this.style.color='#64748b'">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Platform --}}
                <div>
                    <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#475569;margin-bottom:20px">Platform</p>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:12px">
                        @foreach([['E-Modul','Materi visual & video'],['Kuis Interaktif','Soal pilihan ganda'],['Block Playground','Koding drag & drop'],['Papan Ranking','Kompetisi sehat']] as [$nama,$desc])
                        <li>
                            <p style="font-size:14px;color:#e2e8f0;font-weight:600">{{ $nama }}</p>
                            <p style="font-size:12px;color:#475569;margin-top:2px">{{ $desc }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- CTA --}}
                <div>
                    <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#475569;margin-bottom:20px">Mulai Sekarang</p>
                    <p style="font-size:14px;color:#64748b;line-height:1.7;margin-bottom:20px">
                        Bergabung dengan ribuan siswa yang sudah merasakan serunya belajar di kodi.app.
                    </p>
                    <a href="{{ route('register') }}"
                       style="display:inline-block;padding:12px 24px;border-radius:14px;font-size:14px;font-weight:700;color:white;text-decoration:none;background:linear-gradient(135deg,#06b6d4,#a855f7);box-shadow:0 8px 25px -6px rgba(6,182,212,.4)">
                        Daftar Gratis
                    </a>
                    <a href="{{ route('login') }}"
                       style="display:inline-block;margin-top:10px;padding:12px 24px;border-radius:14px;font-size:14px;font-weight:700;color:#94a3b8;text-decoration:none;border:1px solid #1e293b;transition:border-color .2s"
                       onmouseenter="this.style.borderColor='#334155';this.style.color='#e2e8f0'" onmouseleave="this.style.borderColor='#1e293b';this.style.color='#94a3b8'">
                        Masuk
                    </a>
                </div>

            </div>

            {{-- Bottom bar --}}
            <div style="padding:24px 0;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:12px">
                <p style="font-size:13px;color:#334155">
                    © 2025 <span style="color:#475569;font-weight:600">kodi.app</span> — Dibuat dengan dedikasi penuh untuk generasi digital Indonesia.
                </p>
                <p style="font-size:12px;color:#1e293b">
                    Powered by
                    <span style="color:#334155;font-weight:700">Laravel 11</span> &
                    <span style="color:#334155;font-weight:700">Tailwind CSS</span>
                </p>
            </div>

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