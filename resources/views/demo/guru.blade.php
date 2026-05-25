<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Halaman Guru — kodi.app</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Figtree', sans-serif; background: #f8fafc; color: #1e293b; -webkit-font-smoothing: antialiased; min-height: 100vh; }

        /* ── Demo notice ── */
        .demo-notice {
            background: #1e293b; color: #94a3b8;
            text-align: center; padding: 8px 16px;
            font-size: 12px; font-weight: 500;
            display: flex; align-items: center; justify-content: center; gap: 12px; flex-wrap: wrap;
        }
        .demo-notice strong { color: #e2e8f0; }
        .demo-notice a {
            color: #818cf8; font-weight: 600; text-decoration: underline;
        }

        /* ── Navbar ── */
        nav { background: white; border-bottom: 1px solid #e2e8f0; height: 64px; display: flex; align-items: center; padding: 0 32px; justify-content: space-between; }
        .nav-logo { font-size: 18px; font-weight: 700; }
        .nav-logo span:first-child { color: #4f46e5; }
        .nav-logo span:last-child { color: #1e293b; }
        .nav-links { display: flex; align-items: center; gap: 4px; }
        .nav-link { font-size: 14px; font-weight: 500; color: #475569; padding: 6px 12px; border-radius: 6px; text-decoration: none; transition: color .15s; white-space: nowrap; }
        .nav-link:hover { color: #4f46e5; }
        .nav-right { display: flex; align-items: center; gap: 10px; }
        .nav-avatar { width: 28px; height: 28px; border-radius: 50%; background: #e0e7ff; color: #3730a3; font-size: 12px; font-weight: 700; display: flex; align-items: center; justify-content: center; }
        .nav-name { font-size: 14px; font-weight: 500; color: #475569; }

        /* ── Page header ── */
        .page-header { background: white; border-bottom: 1px solid #e2e8f0; padding: 20px 32px; }
        .page-header h2 { font-size: 18px; font-weight: 600; color: #1e293b; }
        .page-header p { font-size: 14px; color: #64748b; margin-top: 2px; }

        /* ── Content ── */
        .content { max-width: 1200px; margin: 0 auto; padding: 32px 24px; }

        /* ── Menu cards ── */
        .menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 32px; }
        @media(min-width: 640px) { .menu-grid { grid-template-columns: repeat(2, 1fr); } }
        @media(min-width: 900px) { .menu-grid { grid-template-columns: repeat(4, 1fr); } }
        .menu-card { background: white; border-radius: 12px; border: 1px solid #e2e8f0; padding: 24px; text-decoration: none; display: block; transition: box-shadow .2s, border-color .2s; position: relative; }
        .menu-card:hover { box-shadow: 0 4px 16px -4px rgba(0,0,0,.1); border-color: #a5b4fc; }
        .menu-icon { width: 40px; height: 40px; background: #eef2ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; transition: background .2s; }
        .menu-card:hover .menu-icon { background: #e0e7ff; }
        .menu-icon svg { width: 20px; height: 20px; color: #4f46e5; stroke: #4f46e5; }
        .menu-card h3 { font-size: 15px; font-weight: 600; color: #1e293b; }
        .menu-card p { font-size: 13px; color: #64748b; margin-top: 4px; }
        .lock-tag { position: absolute; top: 12px; right: 12px; background: #f1f5f9; color: #94a3b8; font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 8px; border: 1px solid #e2e8f0; }

        /* ── Activity card ── */
        .activity-card { background: white; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; }
        .activity-header { padding: 16px 24px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; color: #1e293b; }
        .activity-row { display: flex; align-items: flex-start; gap: 12px; padding: 16px 24px; border-bottom: 1px solid #f8fafc; }
        .activity-row:last-child { border-bottom: none; }
        .act-icon { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px; }
        .act-icon svg { width: 16px; height: 16px; }
        .act-text { font-size: 14px; font-weight: 500; color: #334155; }
        .act-time { font-size: 12px; color: #94a3b8; margin-top: 2px; }

        /* ── Back link ── */
        .back-bar { text-align: center; padding: 20px; font-size: 13px; color: #94a3b8; }
        .back-bar a { color: #4f46e5; font-weight: 600; text-decoration: none; }
        .back-bar a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    {{-- Demo notice --}}
    <div class="demo-notice">
        <strong>Tampilan Demo</strong>
        <span>—</span>
        <span>Halaman ini adalah pratinjau antarmuka guru. Data yang ditampilkan bersifat contoh.</span>
        <a href="{{ route('login') }}">Masuk sebagai Guru</a>
        <span>·</span>
        <a href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>

    {{-- Navbar (exact match real nav) --}}
    <nav>
        <div class="nav-logo">
            <span>Kodi</span><span>.app</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('login') }}" class="nav-link">Beranda</a>
            <a href="{{ route('login') }}" class="nav-link">E-Modul</a>
            <a href="{{ route('login') }}" class="nav-link">Kuis</a>
            <a href="{{ route('login') }}" class="nav-link">Latihan</a>
            <a href="{{ route('login') }}" class="nav-link">Siswa</a>
            <a href="{{ route('login') }}" class="nav-link">Proyek</a>
            <a href="{{ route('login') }}" class="nav-link">Ranking</a>
        </div>
        <div class="nav-right">
            <div class="nav-avatar">DG</div>
            <span class="nav-name">Demo Guru</span>
        </div>
    </nav>

    {{-- Page header (exact match) --}}
    <header class="page-header">
        <h2>Dashboard Guru</h2>
        <p>Selamat datang, Demo Guru</p>
    </header>

    {{-- Content --}}
    <div class="content">

        {{-- Menu cards (same layout & SVG icons as real page) --}}
        <div class="menu-grid">

            <a href="{{ route('login') }}" class="menu-card">
                <span class="lock-tag">Login untuk akses</span>
                <div class="menu-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3>E-Modul</h3>
                <p>Kelola materi pelajaran</p>
            </a>

            <a href="{{ route('login') }}" class="menu-card">
                <span class="lock-tag">Login untuk akses</span>
                <div class="menu-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h3>Kuis &amp; Latihan</h3>
                <p>Tambah dan kelola soal</p>
            </a>

            <a href="{{ route('login') }}" class="menu-card">
                <span class="lock-tag">Login untuk akses</span>
                <div class="menu-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3>Data Siswa</h3>
                <p>Lihat informasi siswa</p>
            </a>

            <a href="{{ route('login') }}" class="menu-card">
                <span class="lock-tag">Login untuk akses</span>
                <div class="menu-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3>Ranking</h3>
                <p>Lihat peringkat siswa</p>
            </a>

        </div>

        {{-- Aktivitas Terbaru (exact match) --}}
        <div class="activity-card">
            <div class="activity-header">Aktivitas Terbaru</div>

            <div class="activity-row">
                <div class="act-icon" style="background:#eef2ff">
                    <svg fill="none" stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <div class="act-text">Materi baru tersedia untuk siswa</div>
                    <div class="act-time">5 jam yang lalu</div>
                </div>
            </div>

            <div class="activity-row">
                <div class="act-icon" style="background:#f0fdf4">
                    <svg fill="none" stroke="#16a34a" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <div class="act-text">Soal kuis berhasil ditambahkan</div>
                    <div class="act-time">1 hari yang lalu</div>
                </div>
            </div>

            <div class="activity-row">
                <div class="act-icon" style="background:#fef3c7">
                    <svg fill="none" stroke="#d97706" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <div class="act-text">Proyek siswa menunggu penilaian</div>
                    <div class="act-time">2 hari yang lalu</div>
                </div>
            </div>

        </div>
    </div>

    <div class="back-bar">
        <a href="{{ url('/') }}">&larr; Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
