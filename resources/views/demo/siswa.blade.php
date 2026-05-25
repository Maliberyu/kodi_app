<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Halaman Murid — kodi.app</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:500,600,700,800,900&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Instrument Sans', sans-serif; background: #f8fafc; min-height: 100vh; }

        /* Demo Banner */
        .demo-bar {
            position: sticky; top: 0; z-index: 999;
            background: linear-gradient(90deg, #f97316, #ec4899);
            color: white; text-align: center;
            padding: 10px 16px; font-size: 13px; font-weight: 700;
            display: flex; align-items: center; justify-content: center; gap: 12px;
            flex-wrap: wrap;
        }
        .demo-bar a {
            background: white; color: #ec4899;
            padding: 5px 16px; border-radius: 20px;
            font-weight: 800; font-size: 12px; text-decoration: none;
            transition: opacity .2s;
        }
        .demo-bar a:hover { opacity: .85; }

        /* Navbar */
        .navbar {
            background: rgba(255,255,255,.97); backdrop-filter: blur(8px);
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 20px; display: flex; align-items: center; justify-content: space-between;
        }
        .navbar-brand { font-size: 20px; font-weight: 900; background: linear-gradient(90deg,#7c3aed,#ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .navbar-user { display: flex; align-items: center; gap: 10px; }
        .avatar-circle { width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg,#7c3aed,#9333ea); color: white; font-weight: 800; font-size: 13px; display: flex; align-items: center; justify-content: center; }

        /* Content */
        .page { max-width: 960px; margin: 0 auto; padding: 24px 16px; display: flex; flex-direction: column; gap: 20px; }

        /* Hero Banner */
        .hero {
            border-radius: 24px; padding: 28px; color: white; position: relative; overflow: hidden;
            background: linear-gradient(135deg,#7c3aed,#9333ea,#4f46e5);
            box-shadow: 0 20px 50px -12px rgba(124,58,237,.4);
        }
        .hero-orb1 { position: absolute; top: -24px; right: -24px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255,255,255,.08); }
        .hero-orb2 { position: absolute; bottom: -16px; left: -16px; width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,.05); }
        .hero-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; position: relative; }
        .hero-rocket { font-size: 56px; animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        .hero-stats { display: grid; grid-template-columns: repeat(3,1fr); gap: 10px; margin-top: 20px; position: relative; }
        .stat-box { background: rgba(255,255,255,.15); border-radius: 16px; padding: 12px; text-align: center; }
        .stat-num { font-size: 22px; font-weight: 900; color: white; }
        .stat-lbl { font-size: 11px; margin-top: 2px; color: rgba(221,214,254,1); }

        /* Menu Grid */
        .menu-title { font-size: 14px; font-weight: 800; color: #475569; display: flex; align-items: center; gap: 6px; }
        .menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
        @media(min-width: 600px) { .menu-grid { grid-template-columns: repeat(3, 1fr); } }
        .menu-card {
            border-radius: 18px; padding: 20px; color: white; text-decoration: none;
            display: block; transition: transform .25s, box-shadow .25s; cursor: pointer;
            position: relative; overflow: hidden;
        }
        .menu-card:hover { transform: translateY(-5px) scale(1.03); }
        .menu-card-icon { font-size: 36px; margin-bottom: 10px; }
        .menu-card-title { font-size: 15px; font-weight: 800; }
        .menu-card-sub { font-size: 11px; margin-top: 4px; opacity: .8; }
        .menu-card-btn { margin-top: 10px; font-size: 11px; font-weight: 700; padding: 3px 12px; border-radius: 20px; background: rgba(255,255,255,.2); display: inline-block; }

        /* Tip Box */
        .tip-box { border-radius: 16px; padding: 16px 20px; display: flex; align-items: center; gap: 14px; background: #fffbeb; border: 2px solid #fcd34d; }
        .tip-icon { font-size: 32px; flex-shrink: 0; }
        .tip-title { font-size: 13px; font-weight: 800; color: #78350f; }
        .tip-text { font-size: 13px; color: #92400e; margin-top: 3px; line-height: 1.5; }

        /* Lock overlay on menu cards */
        .lock-badge { position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,.3); color: white; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 12px; }

        /* Bottom CTA */
        .bottom-cta { border-radius: 24px; padding: 28px; text-align: center; background: linear-gradient(135deg,#6366f1,#a855f7); color: white; }
        .bottom-cta h3 { font-size: 20px; font-weight: 900; margin-bottom: 8px; }
        .bottom-cta p { font-size: 13px; opacity: .85; margin-bottom: 20px; }
        .cta-btn { display: inline-block; padding: 12px 32px; background: white; color: #7c3aed; font-weight: 800; font-size: 14px; border-radius: 20px; text-decoration: none; transition: opacity .2s; }
        .cta-btn:hover { opacity: .9; }
    </style>
</head>
<body>

    {{-- Demo Banner --}}
    <div class="demo-bar">
        <span> Ini tampilan demo halaman Murid — data di bawah adalah contoh</span>
        <a href="{{ route('login') }}"> Login untuk Mulai</a>
        <a href="{{ route('register') }}" style="background:white;color:#7c3aed"> Daftar Gratis</a>
    </div>

    {{-- Navbar --}}
    <nav class="navbar">
        <span class="navbar-brand">kodi.app</span>
        <div class="navbar-user">
            <div class="avatar-circle">DS</div>
            <span style="font-size:13px;font-weight:700;color:#475569">Demo Siswa</span>
        </div>
    </nav>

    {{-- Page Content --}}
    <div class="page">

        {{-- Hero --}}
        <div class="hero">
            <div class="hero-orb1"></div>
            <div class="hero-orb2"></div>
            <div class="hero-top">
                <div>
                    <p style="font-size:13px;color:rgba(221,214,254,1);font-weight:600">Selamat datang kembali! 👋</p>
                    <h1 style="font-size:26px;font-weight:900;color:white;margin-top:4px">Halo, Demo Siswa!</h1>
                    <p style="font-size:13px;color:rgba(221,214,254,1);margin-top:6px">Ayo belajar koding hari ini dan kumpulkan poin sebanyak-banyaknya!</p>
                </div>
                <div class="hero-rocket">🚀</div>
            </div>
            <div class="hero-stats">
                <div class="stat-box"><div class="stat-num">1.250</div><div class="stat-lbl">⭐ Total Poin</div></div>
                <div class="stat-box"><div class="stat-num">7</div><div class="stat-lbl">🔥 Hari Streak</div></div>
                <div class="stat-box"><div class="stat-num">15</div><div class="stat-lbl">🪙 Koin</div></div>
            </div>
        </div>

        {{-- Menu Belajar --}}
        <div>
            <p class="menu-title" style="margin-bottom:12px">🎮 Menu Belajar</p>
            <div class="menu-grid">
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#3b82f6,#06b6d4);box-shadow:0 10px 30px -8px rgba(59,130,246,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">📚</div>
                    <div class="menu-card-title">E-Modul</div>
                    <div class="menu-card-sub">Baca materi & tonton video</div>
                    <div class="menu-card-btn">Buka →</div>
                </a>
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#f97316,#ec4899);box-shadow:0 10px 30px -8px rgba(249,115,22,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">🎯</div>
                    <div class="menu-card-title">Kuis</div>
                    <div class="menu-card-sub">Kerjakan soal, kumpulkan poin</div>
                    <div class="menu-card-btn">Main →</div>
                </a>
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#10b981,#0d9488);box-shadow:0 10px 30px -8px rgba(16,185,129,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">🎮</div>
                    <div class="menu-card-title">Quizizz</div>
                    <div class="menu-card-sub">Mainkan kuis interaktif</div>
                    <div class="menu-card-btn">Main →</div>
                </a>
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#a855f7,#7c3aed);box-shadow:0 10px 30px -8px rgba(168,85,247,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">🛠️</div>
                    <div class="menu-card-title">Proyek</div>
                    <div class="menu-card-sub">Kumpulkan karya kodingmu</div>
                    <div class="menu-card-btn">Lihat →</div>
                </a>
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#eab308,#f97316);box-shadow:0 10px 30px -8px rgba(234,179,8,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">⚡</div>
                    <div class="menu-card-title">Playground</div>
                    <div class="menu-card-sub">Coding drag & drop seru!</div>
                    <div class="menu-card-btn">Coba →</div>
                </a>
                <a href="{{ route('login') }}" class="menu-card" style="background:linear-gradient(135deg,#f43f5e,#dc2626);box-shadow:0 10px 30px -8px rgba(244,63,94,.4)">
                    <div class="lock-badge">🔒 Login</div>
                    <div class="menu-card-icon">🏆</div>
                    <div class="menu-card-title">Ranking</div>
                    <div class="menu-card-sub">Lihat posisimu di papan skor</div>
                    <div class="menu-card-btn">Cek →</div>
                </a>
            </div>
        </div>

        {{-- Tip --}}
        <div class="tip-box">
            <div class="tip-icon">💡</div>
            <div>
                <div class="tip-title">Tahukah kamu?</div>
                <div class="tip-text">Koding adalah bahasa masa depan. Setiap baris kode yang kamu tulis hari ini, adalah langkah menuju mimpi besarmu! 🌟</div>
            </div>
        </div>

        {{-- Bottom CTA --}}
        <div class="bottom-cta">
            <h3>Siap mulai petualangan? </h3>
            <p>Daftar sekarang dan mulai kumpulkan poin, raih ranking, dan tunjukkan kehebatanmu!</p>
            <a href="{{ route('register') }}" class="cta-btn">  Daftar Gratis Sekarang</a>
        </div>

    </div>

    {{-- Back to welcome --}}
    <div style="text-align:center;padding:20px;font-size:13px;color:#94a3b8">
        <a href="{{ url('/') }}" style="color:#6366f1;font-weight:700;text-decoration:none">← Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
