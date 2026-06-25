<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kodi.app - Belajar Seru untuk Generasi Digital</title>
    <meta name="description" content="Platform belajar interaktif penuh warna untuk anak dan remaja.">

    <link rel="manifest" href="{{ url('/manifest.json') }}">
    <meta name="theme-color" content="#7c3aed">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="KODI">
    <link rel="apple-touch-icon" href="{{ asset('icon/icon.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.12.97/build/spline-viewer.js"></script>

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Instrument Sans', sans-serif; margin: 0; background: linear-gradient(135deg, #f8faff 0%, #fdf4ff 50%, #f0fdff 100%); min-height: 100vh; }

        /* ===== PHASE 1: SPLINE VIEWER (robot humanoid) ===== */
        #spline-intro {
            position: fixed; top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: 10000; display: block;
            transition: opacity 1.2s cubic-bezier(.4,0,.2,1);
        }
        #spline-intro.fade-out { opacity: 0; pointer-events: none; }

        #spline-loader {
            position: fixed; bottom: 40px; left: 50%; transform: translateX(-50%);
            display: flex; align-items: center; gap: 10px;
            font-family: 'Instrument Sans', sans-serif;
            font-size: 13px; font-weight: 600; letter-spacing: .08em; color: #94a3b8;
            white-space: nowrap; transition: opacity .5s;
            z-index: 10001;
        }
        #spline-loader.hide { opacity: 0; pointer-events: none; }
        .loader-dots { display: flex; gap: 5px; }
        .loader-dots span {
            width: 7px; height: 7px; border-radius: 50%;
            animation: dotBounce 1.2s ease-in-out infinite;
        }
        .loader-dots span:nth-child(1) { background: #06b6d4; }
        .loader-dots span:nth-child(2) { background: #a855f7; animation-delay: .2s; }
        .loader-dots span:nth-child(3) { background: #7c3aed; animation-delay: .4s; }
        @keyframes dotBounce {
            0%, 80%, 100% { transform: scale(.55); opacity: .35; }
            40%            { transform: scale(1);   opacity: 1; }
        }

        /* ===== PHASE 2: DARK INTRO SCREEN ===== */
        #intro-screen {
            position: fixed; inset: 0; z-index: 9999;
            background: linear-gradient(135deg, #0f0820 0%, #1a0a3e 55%, #060e24 100%);
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        #intro-screen.exit {
            animation: introFadeOut 0.9s cubic-bezier(.4,0,.2,1) forwards;
        }
        @keyframes introFadeOut {
            0%   { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(1.04); }
        }

        /* Scan line */
        #intro-scan {
            position: absolute; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, transparent 0%, #06b6d4 30%, #a855f7 70%, transparent 100%);
            box-shadow: 0 0 18px 4px rgba(168,85,247,.5), 0 0 40px 8px rgba(6,182,212,.3);
            animation: scanMove 2.4s ease-in-out infinite;
            z-index: 2;
        }
        @keyframes scanMove {
            0%   { top: -2px; opacity: 0; }
            5%   { opacity: 1; }
            95%  { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }

        /* Grid overlay */
        #intro-grid {
            position: absolute; inset: 0; z-index: 1;
            background-image:
                linear-gradient(rgba(168,85,247,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168,85,247,.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* Center content */
        #intro-center {
            position: relative; z-index: 3;
            display: flex; flex-direction: column; align-items: center; gap: 14px;
            opacity: 0;
        }
        #intro-center.show {
            animation: introTextIn 0.9s cubic-bezier(.175,.885,.32,1.275) forwards;
        }
        @keyframes introTextIn {
            0%   { opacity: 0; transform: scale(0.5) translateY(20px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        #intro-logo {
            font-size: clamp(4rem, 14vw, 7rem);
            font-weight: 900; letter-spacing: -2px;
            background: linear-gradient(90deg, #06b6d4, #a855f7, #06b6d4);
            background-size: 200% auto;
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            animation: gradientShift 2.5s linear infinite;
        }
        #intro-center.show #intro-logo {
            animation: gradientShift 2.5s linear infinite, glowPulse 2s ease-in-out 0.5s infinite;
        }
        @keyframes gradientShift {
            0%   { background-position: 0% center; }
            100% { background-position: 200% center; }
        }
        @keyframes glowPulse {
            0%, 100% { filter: drop-shadow(0 0 12px rgba(168,85,247,.6)) drop-shadow(0 0 28px rgba(6,182,212,.4)); }
            50%       { filter: drop-shadow(0 0 28px rgba(168,85,247,.9)) drop-shadow(0 0 60px rgba(6,182,212,.7)); }
        }

        #intro-tagline {
            font-size: clamp(12px, 2.5vw, 16px);
            font-weight: 600; letter-spacing: .35em; text-transform: uppercase;
            color: rgba(255,255,255,.55);
        }

        /* Progress bar */
        #intro-progress {
            position: absolute; bottom: 0; left: 0; height: 3px;
            background: linear-gradient(90deg, #06b6d4, #a855f7);
            width: 0%; z-index: 10;
        }

        .gradient-text {
            background: linear-gradient(90deg, #06b6d4, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Tombol seimbang: lebar sama di semua breakpoint */
        .btn-group { display: flex; gap: 14px; flex-wrap: wrap; }
        .btn-group a {
            flex: 1 1 0;
            min-width: 140px;
            text-align: center;
            padding: 15px 24px;
            font-size: 15px;
            font-weight: 700;
            border-radius: 14px;
            text-decoration: none;
            transition: transform .2s, box-shadow .2s;
        }
        .btn-group a:hover { transform: translateY(-2px); }
        .btn-cyan  { background: #06b6d4; color: #fff; box-shadow: 0 6px 20px -4px rgba(6,182,212,.4); }
        .btn-cyan:hover  { background: #0891b2; box-shadow: 0 10px 28px -4px rgba(6,182,212,.5); }
        .btn-purple { background: #7c3aed; color: #fff; box-shadow: 0 6px 20px -4px rgba(124,58,237,.4); }
        .btn-purple:hover { background: #6d28d9; }

        .card-hover { transition: transform .25s, box-shadow .25s; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 24px 48px -12px rgba(0,0,0,.15) !important; }

        /* Responsive hero */
        .hero-wrap { display: flex; align-items: center; gap: 56px; }
        .hero-text { flex: 1; min-width: 0; }
        .hero-anim { flex-shrink: 0; }

        @media (max-width: 767px) {
            .hero-wrap { flex-direction: column-reverse; gap: 24px; }
            .hero-text { text-align: center; }
            .hero-text .btn-group { justify-content: center; }
            .hero-anim dotlottie-wc { width: 270px !important; height: 270px !important; }
        }
    </style>
</head>

<body>

    {{-- ===== PHASE 1: Spline scene (robot humanoid) ===== --}}
    <spline-viewer id="spline-intro" url="{{ asset('scene.splinecode') }}"></spline-viewer>
    <div id="spline-loader">
        <div class="loader-dots"><span></span><span></span><span></span></div>
        <span>memuat scene...</span>
    </div>

    {{-- ===== PHASE 2: Dark intro screen (kodi.app text) ===== --}}
    <div id="intro-screen">
        <div id="intro-grid"></div>
        <div id="intro-scan"></div>
        <div id="intro-center">
            <div id="intro-logo">kodi.app</div>
            <div id="intro-tagline">Platform Belajar Interaktif</div>
        </div>
        <div id="intro-progress"></div>
    </div>

    {{-- ===== NAVBAR ===== --}}
    <nav style="background: rgba(255,255,255,.93); backdrop-filter: blur(12px); border-bottom: 1px solid #f1f5f9; position: sticky; top: 0; z-index: 100;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 14px 24px; display: flex; justify-content: space-between; align-items: center;">

            <a href="#" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <!-- <img src="{{ asset('icon/icon.png') }}" alt="KODI" style="width: 36px; height: 36px; border-radius: 10px; object-fit: contain;"> -->
                <span class="gradient-text" style="font-size: 21px; font-weight: 900; letter-spacing: -.5px;">kodi.app</span>
            </a>

            <div id="nav-links" style="display: flex; align-items: center; gap: 28px;">
                <a href="#" style="color: #475569; font-weight: 600; font-size: 14px; text-decoration: none;">Beranda</a>
                <a href="#tentang-kami" style="color: #475569; font-weight: 600; font-size: 14px; text-decoration: none;">Tentang Kami</a>
                <a href="#kontak" style="color: #475569; font-weight: 600; font-size: 14px; text-decoration: none;">Kontak</a>
                <a href="{{ route('login') }}"
                   style="padding: 9px 22px; background: #7c3aed; color: #fff; font-weight: 700; font-size: 14px; border-radius: 10px; text-decoration: none;">
                    Masuk
                </a>
            </div>

            <button id="hamburger" onclick="toggleMenu()"
                    style="display: none; background: none; border: none; cursor: pointer; padding: 4px;">
                <svg id="icon-menu" width="26" height="26" fill="none" stroke="#334155" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" width="26" height="26" fill="none" stroke="#334155" stroke-width="2" viewBox="0 0 24 24" style="display:none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" style="display: none; background: #fff; border-top: 1px solid #f1f5f9; padding: 16px 24px 20px;">
            <div style="display: flex; flex-direction: column; gap: 10px; text-align: center;">
                <a href="#" style="color: #475569; font-weight: 600; font-size: 15px; text-decoration: none; padding: 8px 0;">Beranda</a>
                <a href="#tentang-kami" style="color: #475569; font-weight: 600; font-size: 15px; text-decoration: none; padding: 8px 0;">Tentang Kami</a>
                <a href="#kontak" style="color: #475569; font-weight: 600; font-size: 15px; text-decoration: none; padding: 8px 0;">Kontak</a>
                <a href="{{ route('login') }}"
                   style="padding: 13px; background: #7c3aed; color: #fff; font-weight: 700; border-radius: 12px; text-decoration: none;">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   style="padding: 13px; background: #06b6d4; color: #fff; font-weight: 700; border-radius: 12px; text-decoration: none;">
                    Daftar Gratis
                </a>
            </div>
        </div>
    </nav>

    {{-- ===== HERO ===== --}}
    <section id="beranda" style="max-width: 1200px; margin: 0 auto; padding: 72px 24px 56px;">
        <div class="hero-wrap">

            {{-- Kiri: Teks --}}
            <div class="hero-text">
                <span style="display: inline-block; padding: 6px 16px; background: #ede9fe; color: #7c3aed; font-size: 12px; font-weight: 700; border-radius: 20px; letter-spacing: .08em; text-transform: uppercase; margin-bottom: 22px;">
                    Platform Belajar Interaktif
                </span>

                <h1 style="font-size: clamp(2rem, 5vw, 3.25rem); font-weight: 900; line-height: 1.15; color: #0f172a; margin: 0 0 18px;">
                    Belajar Lebih Seru,<br>
                    <span class="gradient-text">Masa Depan Lebih Cerah</span>
                </h1>

                <p style="font-size: 17px; color: #64748b; line-height: 1.75; margin: 0 0 36px; max-width: 460px;">
                    Platform belajar interaktif untuk anak dan remaja. Kuis, e-modul, coding playground, dan papan ranking — semua dalam satu tempat.
                </p>

                <div class="btn-group">
                    <a href="{{ route('login') }}" class="btn-cyan">Masuk Sekarang</a>
                    <a href="{{ route('register') }}" class="btn-purple">Daftar Gratis</a>
                </div>

                <p style="margin-top: 22px; font-size: 13px; color: #94a3b8; font-style: italic;">
                    Sedikit belajar hari ini, banyak manfaat di kemudian hari.
                </p>
            </div>

            {{-- Kanan: Animasi --}}
            <div class="hero-anim">
                <dotlottie-wc
                    src="https://lottie.host/eead6ccc-66c8-486b-8d9b-32f5d52cd2ed/mH8xK5Pov1.lottie"
                    background="transparent"
                    speed="0.9"
                    style="width: 400px; height: 400px; max-width: 85vw; display: block;"
                    autoplay loop hover>
                </dotlottie-wc>
            </div>

        </div>
    </section>

    {{-- ===== FITUR STRIP ===== --}}
    <div style="background: #fff; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9; padding: 32px 24px;">
        <div style="max-width: 960px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 28px;">
            @php
            $features = [
                ['#06b6d4', 'E-Modul', 'Materi visual & interaktif',
                 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['#7c3aed', 'Kuis', 'Soal seru & menantang',
                 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['#ec4899', 'Playground', 'Coding drag & drop',
                 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                ['#f59e0b', 'Ranking', 'Kompetisi yang sehat',
                 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
            ];
            @endphp
            @foreach($features as [$color, $nama, $desc, $path])
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 46px; height: 46px; border-radius: 13px; background: {{ $color }}18; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="22" height="22" fill="none" stroke="{{ $color }}" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                    </svg>
                </div>
                <div>
                    <p style="font-size: 14px; font-weight: 700; color: #1e293b; margin: 0 0 2px;">{{ $nama }}</p>
                    <p style="font-size: 12px; color: #94a3b8; margin: 0;">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ===== TENTANG KAMI ===== --}}
    <section id="tentang-kami" style="background: #fff; padding: 96px 24px;">
        <div style="max-width: 1100px; margin: 0 auto;">

            <div style="text-align: center; margin-bottom: 64px;">
                <p style="font-size: 12px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: #06b6d4; margin: 0 0 12px;">Siapa Kami</p>
                <h2 class="gradient-text" style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900; margin: 0 0 14px;">Tentang kodi.app</h2>
                <p style="font-size: 17px; color: #64748b; max-width: 500px; margin: 0 auto; line-height: 1.7;">
                    Lahir dari mimpi besar: membuat belajar jadi petualangan seru bagi generasi digital.
                </p>
            </div>

            {{-- Visi & Misi --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 80px;">
                <div style="background: linear-gradient(135deg, #ecfeff, #f0f9ff); border-radius: 24px; padding: 32px;">
                    <div style="width: 48px; height: 48px; background: rgba(6,182,212,.15); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                        <svg width="24" height="24" fill="none" stroke="#06b6d4" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 10px;">Siapa Kami?</h3>
                    <p style="font-size: 15px; color: #64748b; line-height: 1.75; margin: 0;">
                        kodi.app menggabungkan animasi, game, dan tantangan interaktif agar belajar terasa seperti petualangan — bukan beban.
                    </p>
                </div>

                <div style="background: linear-gradient(135deg, #fdf4ff, #faf5ff); border-radius: 24px; padding: 32px;">
                    <div style="width: 48px; height: 48px; background: rgba(168,85,247,.15); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                        <svg width="24" height="24" fill="none" stroke="#a855f7" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 10px;">Misi Kami</h3>
                    <p style="font-size: 15px; color: #64748b; line-height: 1.75; margin: 0;">
                        Memberdayakan setiap anak dan remaja menemukan cara belajar yang paling mereka suka — agar setiap "Aha!" moment terjadi setiap hari.
                    </p>
                </div>
            </div>

            {{-- Judul Tim --}}
            <div style="text-align: center; margin-bottom: 48px;">
                <p style="font-size: 12px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: #06b6d4; margin: 0 0 12px;">The Team</p>
                <h3 class="gradient-text" style="font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 900; margin: 0 0 12px;">Tim Praktisi Kami</h3>
                <p style="font-size: 15px; color: #94a3b8; max-width: 440px; margin: 0 auto;">
                    Para praktisi yang mendedikasikan ilmunya untuk generasi digital Indonesia.
                </p>
            </div>

            {{-- Bu Risda --}}
            <div style="display: flex; justify-content: center; margin-bottom: 48px;">
                <a href="{{ url('/profile/bu-Risda') }}" class="card-hover"
                   style="display: block; width: 100%; max-width: 300px; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 48px -12px rgba(6,182,212,.2); text-decoration: none; background: #fff;">
                    <div style="position: relative;">
                        <img src="{{ asset('storage/poto.jpeg') }}" alt="Bu Risda"
                             style="width: 100%; height: 290px; object-fit: cover; display: block;">
                        <div style="position: absolute; top: 14px; left: 50%; transform: translateX(-50%);">
                            <span style="padding: 5px 16px; background: linear-gradient(135deg,#06b6d4,#a855f7); color: #fff; font-size: 11px; font-weight: 800; border-radius: 20px; letter-spacing: .1em; text-transform: uppercase; white-space: nowrap;">
                                The Leader
                            </span>
                        </div>
                    </div>
                    <div style="padding: 22px; text-align: center; background: linear-gradient(180deg, #ecfeff, #fff);">
                        <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">Risda Ayulia Apandi, S.Pd.</h4>
                        <p style="font-size: 13px; font-weight: 700; color: #06b6d4; margin: 0 0 2px;">Guru Koding</p>
                        <p style="font-size: 12px; color: #94a3b8; margin: 0 0 14px;">Pendidik & Inisiator kodi.app</p>
                        <span style="display: inline-block; padding: 8px 20px; background: linear-gradient(135deg,#06b6d4,#a855f7); color: #fff; font-size: 13px; font-weight: 700; border-radius: 20px;">
                            Lihat Portofolio
                        </span>
                    </div>
                </a>
            </div>

            {{-- Divider Tim Pengembang --}}
            <div style="display: flex; align-items: center; gap: 16px; max-width: 480px; margin: 0 auto 36px;">
                <div style="flex: 1; height: 1px; background: linear-gradient(90deg, transparent, #e2e8f0);"></div>
                <p style="font-size: 11px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: #cbd5e1; white-space: nowrap; margin: 0;">Tim Pengembang</p>
                <div style="flex: 1; height: 1px; background: linear-gradient(90deg, #e2e8f0, transparent);"></div>
            </div>

            {{-- Aris & Alwi --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; max-width: 540px; margin: 0 auto 80px;">
                <div class="card-hover" style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 24px -6px rgba(0,0,0,.1);">
                    <img src="https://avatars.githubusercontent.com/u/219940777?v=4" alt="Aris Sunandar"
                         style="width: 100%; height: 200px; object-fit: cover; display: block;">
                    <div style="padding: 18px; text-align: center; background: linear-gradient(180deg,#faf5ff,#fff);">
                        <h4 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 4px;">Aris Sunandar, A.Md.Kom., CEH.</h4>
                        <p style="font-size: 12px; font-weight: 600; color: #9333ea; margin: 0;">Frontend Developer</p>
                    </div>
                </div>

                <div class="card-hover" style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 24px -6px rgba(0,0,0,.1);">
                    <img src="https://media.licdn.com/dms/image/v2/D5603AQHebX5W-ckZoQ/profile-displayphoto-scale_200_200/B56ZwETLRtKsAY-/0/1769598662550?e=2147483647&v=beta&t=fJOX3_iINZkHdIk2ihjHMR75in6j-c9vmvaoqTwb3Mc"
                         alt="Alwi Nurfaizi" style="width: 100%; height: 200px; object-fit: cover; display: block;">
                    <div style="padding: 18px; text-align: center; background: linear-gradient(180deg,#fffbeb,#fff);">
                        <h4 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 4px;">Alwi Nurfaizi, S.Kom.</h4>
                        <p style="font-size: 12px; font-weight: 600; color: #d97706; margin: 0;">Backend Developer</p>
                    </div>
                </div>
            </div>

            {{-- ===== PORTAL ===== --}}
            <div style="text-align: center; margin-bottom: 48px;">
                <p style="font-size: 12px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: #06b6d4; margin: 0 0 12px;">Pilih Peranmu</p>
                <h3 class="gradient-text" style="font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 900; margin: 0 0 12px;">Masuk ke Portal</h3>
                <p style="font-size: 15px; color: #64748b; max-width: 380px; margin: 0 auto;">
                    Pilih portal sesuai peranmu dan mulai belajar!
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 880px; margin: 0 auto;">

                {{-- Portal Guru --}}
                <div style="border-radius: 24px; overflow: hidden; box-shadow: 0 16px 40px -12px rgba(99,102,241,.2);">
                    <div style="padding: 36px 28px; text-align: center; background: linear-gradient(135deg, #6366f1, #7c3aed);">
                        <div style="width: 56px; height: 56px; background: rgba(255,255,255,.15); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                            <svg width="28" height="28" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                            </svg>
                        </div>
                        <h4 style="font-size: 22px; font-weight: 900; color: #fff; margin: 0 0 6px;">Portal Guru</h4>
                        <p style="font-size: 13px; color: rgba(255,255,255,.75); margin: 0;">Kelola kelas & pantau perkembangan siswa</p>
                    </div>
                    <div style="padding: 24px 28px 28px; background: #fff;">
                        @php $guruFeatures = [
                            ['Buat & kelola E-Modul', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                            ['Buat soal kuis interaktif', 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'],
                            ['Nilai proyek siswa', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['Pantau ranking & progress', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                        ]; @endphp
                        <ul style="list-style: none; margin: 0 0 22px; padding: 0; display: flex; flex-direction: column; gap: 12px;">
                            @foreach($guruFeatures as [$txt, $path])
                            <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: #475569; font-weight: 500;">
                                <div style="width: 32px; height: 32px; background: #ede9fe; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="16" height="16" fill="none" stroke="#7c3aed" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                                    </svg>
                                </div>
                                {{ $txt }}
                            </li>
                            @endforeach
                        </ul>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('demo.guru') }}"
                               style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #6366f1; background: #eef2ff; border-radius: 12px; text-decoration: none;">
                                Lihat Demo
                            </a>
                            @if(auth()->check() && auth()->user()->isGuru())
                                <a href="{{ route('guru.home') }}"
                                   style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #fff; background: linear-gradient(135deg,#6366f1,#7c3aed); border-radius: 12px; text-decoration: none;">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #fff; background: linear-gradient(135deg,#6366f1,#7c3aed); border-radius: 12px; text-decoration: none;">
                                    Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Portal Murid --}}
                <div style="border-radius: 24px; overflow: hidden; box-shadow: 0 16px 40px -12px rgba(236,72,153,.2);">
                    <div style="padding: 36px 28px; text-align: center; background: linear-gradient(135deg, #ec4899, #a855f7);">
                        <div style="width: 56px; height: 56px; background: rgba(255,255,255,.15); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                            <svg width="28" height="28" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h4 style="font-size: 22px; font-weight: 900; color: #fff; margin: 0 0 6px;">Portal Murid</h4>
                        <p style="font-size: 13px; color: rgba(255,255,255,.75); margin: 0;">Belajar seru, kumpulkan poin & raih juara!</p>
                    </div>
                    <div style="padding: 24px 28px 28px; background: #fff;">
                        @php $muridFeatures = [
                            ['Pelajari E-Modul interaktif', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                            ['Kerjakan kuis & tantangan', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['Coding di Block Playground', 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                            ['Bersaing di papan ranking', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                        ]; @endphp
                        <ul style="list-style: none; margin: 0 0 22px; padding: 0; display: flex; flex-direction: column; gap: 12px;">
                            @foreach($muridFeatures as [$txt, $path])
                            <li style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: #475569; font-weight: 500;">
                                <div style="width: 32px; height: 32px; background: #fce7f3; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="16" height="16" fill="none" stroke="#ec4899" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                                    </svg>
                                </div>
                                {{ $txt }}
                            </li>
                            @endforeach
                        </ul>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('demo.siswa') }}"
                               style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #ec4899; background: #fdf2f8; border-radius: 12px; text-decoration: none;">
                                Lihat Demo
                            </a>
                            @if(auth()->check() && auth()->user()->isSiswa())
                                <a href="{{ route('siswa.home') }}"
                                   style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #fff; background: linear-gradient(135deg,#ec4899,#a855f7); border-radius: 12px; text-decoration: none;">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   style="flex: 1; padding: 12px; text-align: center; font-size: 13px; font-weight: 700; color: #fff; background: linear-gradient(135deg,#ec4899,#a855f7); border-radius: 12px; text-decoration: none;">
                                    Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- ===== KONTAK ===== --}}
    <section id="kontak" style="background: #0f172a; padding: 96px 24px;">
        <div style="max-width: 1100px; margin: 0 auto;">

            <div style="text-align: center; margin-bottom: 64px;">
                <p style="font-size: 12px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #06b6d4; margin: 0 0 12px;">Hubungi Kami</p>
                <h2 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 900; color: #fff; margin: 0 0 14px; line-height: 1.2;">Punya Pertanyaan?</h2>
                <p style="font-size: 16px; color: #94a3b8; max-width: 480px; margin: 0 auto; line-height: 1.7;">
                    Saran, kritik, atau ingin berkolaborasi? Tim kodi.app selalu terbuka dan siap merespons.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 18px; margin-bottom: 56px;">

                <div style="background: #1e293b; border: 1px solid #334155; border-radius: 20px; padding: 26px 22px; display: flex; align-items: flex-start; gap: 16px; transition: border-color .2s;"
                     onmouseenter="this.style.borderColor='#06b6d4'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(6,182,212,.12); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="20" height="20" fill="none" stroke="#06b6d4" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 5px;">Email</p>
                        <p style="font-size: 15px; font-weight: 700; color: #fff; margin: 0 0 3px;">maliberyu@gmail.com</p>
                        <p style="font-size: 12px; color: #64748b; margin: 0;">Respons dalam 1x24 jam</p>
                    </div>
                </div>

                <div style="background: #1e293b; border: 1px solid #334155; border-radius: 20px; padding: 26px 22px; display: flex; align-items: flex-start; gap: 16px; transition: border-color .2s;"
                     onmouseenter="this.style.borderColor='#e879f9'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(232,121,249,.12); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="20" height="20" fill="none" stroke="#e879f9" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="#e879f9" stroke="none"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 5px;">Instagram</p>
                        <p style="font-size: 15px; font-weight: 700; color: #fff; margin: 0 0 3px;">@kodi.app</p>
                        <p style="font-size: 12px; color: #64748b; margin: 0;">Update & konten terbaru</p>
                    </div>
                </div>

                <a href="https://whatsapp.com/channel/0029Vay0hFn2v1IrMtLECk0M"
                   style="background: #1e293b; border: 1px solid #334155; border-radius: 20px; padding: 26px 22px; display: flex; align-items: flex-start; gap: 16px; text-decoration: none; transition: border-color .2s;"
                   onmouseenter="this.style.borderColor='#22c55e'" onmouseleave="this.style.borderColor='#334155'">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(34,197,94,.12); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#22c55e">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: .1em; margin: 0 0 5px;">WhatsApp Channel</p>
                        <p style="font-size: 15px; font-weight: 700; color: #fff; margin: 0 0 3px;">kodi.app Official</p>
                        <p style="font-size: 12px; color: #22c55e; font-weight: 600; margin: 0;">Klik untuk bergabung</p>
                    </div>
                </a>

            </div>

            <div style="height: 1px; background: linear-gradient(90deg, transparent, #334155, transparent); margin-bottom: 48px;"></div>

            <div style="text-align: center;">
                <p style="font-size: 15px; color: #475569; max-width: 600px; margin: 0 auto; line-height: 1.8; font-style: italic;">
                    "Kami percaya bahwa setiap anak berhak mendapatkan pendidikan yang menyenangkan, bermakna, dan relevan dengan masa depan."
                </p>
                <p style="font-size: 13px; color: #334155; margin: 16px 0 0; font-weight: 700;">— Tim kodi.app</p>
            </div>

        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer style="background: #020617; padding: 64px 24px 0;">
        <div style="max-width: 1100px; margin: 0 auto;">

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 48px; padding-bottom: 56px; border-bottom: 1px solid #1e293b;">

                <div>
                    <p class="gradient-text" style="font-size: 24px; font-weight: 900; margin: 0 0 12px;">kodi.app</p>
                    <p style="font-size: 14px; color: #64748b; line-height: 1.7; max-width: 220px; margin: 0 0 20px;">
                        Platform belajar koding interaktif untuk generasi digital Indonesia.
                    </p>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <span style="font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: #1e293b; color: #06b6d4; border: 1px solid #334155;">Laravel</span>
                        <span style="font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: #1e293b; color: #a855f7; border: 1px solid #334155;">Tailwind</span>
                        <span style="font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: #1e293b; color: #f59e0b; border: 1px solid #334155;">Alpine.js</span>
                    </div>
                </div>

                <div>
                    <p style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .15em; color: #475569; margin: 0 0 20px;">Navigasi</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                        @foreach([['#','Beranda'],['#tentang-kami','Tentang Kami'],['#kontak','Kontak'],['','Portal Guru'],['','Portal Murid']] as [$href,$label])
                        <li>
                            <a href="{{ $href ?: route('login') }}"
                               style="font-size: 14px; color: #64748b; text-decoration: none;"
                               onmouseenter="this.style.color='#e2e8f0'" onmouseleave="this.style.color='#64748b'">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .15em; color: #475569; margin: 0 0 20px;">Platform</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                        @foreach([['E-Modul','Materi visual & video'],['Kuis Interaktif','Soal pilihan ganda'],['Playground','Koding drag & drop'],['Papan Ranking','Kompetisi sehat']] as [$nama,$desc])
                        <li>
                            <p style="font-size: 14px; color: #e2e8f0; font-weight: 600; margin: 0;">{{ $nama }}</p>
                            <p style="font-size: 12px; color: #475569; margin: 2px 0 0;">{{ $desc }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .15em; color: #475569; margin: 0 0 20px;">Mulai Sekarang</p>
                    <p style="font-size: 14px; color: #64748b; line-height: 1.7; margin: 0 0 20px;">
                        Bergabung dan rasakan serunya belajar di kodi.app.
                    </p>
                    <a href="{{ route('register') }}"
                       style="display: block; padding: 12px 24px; border-radius: 12px; font-size: 14px; font-weight: 700; color: #fff; text-decoration: none; background: linear-gradient(135deg,#06b6d4,#a855f7); text-align: center; margin-bottom: 10px;">
                        Daftar Gratis
                    </a>
                    <a href="{{ route('login') }}"
                       style="display: block; padding: 12px 24px; border-radius: 12px; font-size: 14px; font-weight: 700; color: #94a3b8; text-decoration: none; border: 1px solid #1e293b; text-align: center; transition: all .2s;"
                       onmouseenter="this.style.borderColor='#334155';this.style.color='#e2e8f0'" onmouseleave="this.style.borderColor='#1e293b';this.style.color='#94a3b8'">
                        Masuk
                    </a>
                </div>

            </div>

            <div style="padding: 24px 0; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 10px;">
                <p style="font-size: 13px; color: #334155; margin: 0;">
                    &copy; 2025 <span style="color: #475569; font-weight: 600;">kodi.app</span> — Dibuat dengan dedikasi untuk generasi digital Indonesia.
                </p>
                <p style="font-size: 12px; color: #1e293b; margin: 0;">
                    Powered by <span style="color: #334155; font-weight: 700;">Laravel 11</span> & <span style="color: #334155; font-weight: 700;">Tailwind CSS</span>
                </p>
            </div>

        </div>
    </footer>

    <script>
        var menuOpen = false;

        function toggleMenu() {
            menuOpen = !menuOpen;
            document.getElementById('mobile-menu').style.display  = menuOpen ? 'block' : 'none';
            document.getElementById('icon-menu').style.display    = menuOpen ? 'none'  : 'block';
            document.getElementById('icon-close').style.display   = menuOpen ? 'block' : 'none';
        }

        function checkWidth() {
            var w = window.innerWidth;
            document.getElementById('hamburger').style.display   = w < 768 ? 'block' : 'none';
            document.getElementById('nav-links').style.display   = w < 768 ? 'none'  : 'flex';
            if (w >= 768) {
                document.getElementById('mobile-menu').style.display = 'none';
                menuOpen = false;
            }
        }

        checkWidth();
        window.addEventListener('resize', checkWidth);
    </script>

    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>

    <script>
    (function () {
        var splineEl  = document.getElementById('spline-intro');
        var introScr  = document.getElementById('intro-screen');
        var center    = document.getElementById('intro-center');
        var bar       = document.getElementById('intro-progress');
        var loader    = document.getElementById('spline-loader');

        if (sessionStorage.getItem('kodi_intro_done')) {
            splineEl.style.display = 'none';
            loader.style.display   = 'none';
            introScr.style.display = 'none';
            return;
        }

        document.body.style.overflow = 'hidden';

        var phase2Started = false;
        var exitTriggered = false;

        function startPhase2() {
            if (phase2Started) return;
            phase2Started = true;
            loader.classList.add('hide');
            splineEl.classList.add('fade-out');
            setTimeout(function () { splineEl.style.display = 'none'; }, 1200);
            setTimeout(function () {
                center.classList.add('show');
                bar.style.transition = 'width 2.6s linear';
                bar.style.width = '100%';
            }, 600);
            setTimeout(exitIntro, 3300);
        }

        function exitIntro() {
            if (exitTriggered) return;
            exitTriggered = true;
            introScr.classList.add('exit');
            setTimeout(function () {
                introScr.style.display = 'none';
                document.body.style.overflow = '';
                sessionStorage.setItem('kodi_intro_done', '1');
            }, 900);
        }

        splineEl.addEventListener('load-complete', function () {
            loader.classList.add('hide');
            setTimeout(startPhase2, 1500);
        });

        setTimeout(startPhase2, 5000);
        setTimeout(exitIntro, 9000);
    })();
    </script>

    <x-pwa-install-banner />

    <script>
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
          navigator.serviceWorker.register('{{ asset('sw.js') }}');
        });
      }
    </script>
</body>
</html>
