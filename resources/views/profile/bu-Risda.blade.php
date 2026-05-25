{{-- Portofolio Digital – Risda Ayulia Apandi --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio Digital – Risda Ayulia Apandi, S.Pd.</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:500,600,700,800,900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Instrument Sans', sans-serif; background: #f0f9ff; color: #1e293b; -webkit-font-smoothing: antialiased; }

        /* ── Keyframes ── */
        @keyframes fadeUp   { from { opacity:0; transform:translateY(28px) } to { opacity:1; transform:translateY(0) } }
        @keyframes float    { 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-8px) } }
        @keyframes shimmer  { 0%{ background-position:-200% center } 100%{ background-position:200% center } }
        .fade-up  { animation: fadeUp .7s ease forwards; }
        .fade-up2 { animation: fadeUp .7s .15s ease forwards; opacity:0; }
        .fade-up3 { animation: fadeUp .7s .3s ease forwards; opacity:0; }

        /* ── Navbar ── */
        .topbar {
            position: sticky; top: 0; z-index: 100;
            background: rgba(255,255,255,.92); backdrop-filter: blur(16px);
            border-bottom: 1px solid #e0f2fe;
            padding: 12px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
        }
        .topbar-brand { font-size: 18px; font-weight: 900; background: linear-gradient(90deg,#0ea5e9,#a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; white-space: nowrap; }
        .topbar-back { font-size: 13px; font-weight: 700; color: #64748b; text-decoration: none; padding: 6px 14px; border: 1px solid #e2e8f0; border-radius: 10px; transition: all .2s; white-space: nowrap; }
        .topbar-back:hover { border-color: #0ea5e9; color: #0ea5e9; }

        /* ── Hero ── */
        .hero {
            position: relative; overflow: hidden;
            min-height: 70vh;
            display: flex; align-items: flex-end;
        }
        .hero img {
            position: absolute; inset: 0; width: 100%; height: 100%;
            object-fit: cover; object-position: center top;
            transition: transform 8s ease;
        }
        .hero:hover img { transform: scale(1.04); }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(2,12,27,.9) 0%, rgba(2,12,27,.5) 50%, rgba(2,12,27,.15) 100%);
        }
        .hero-content {
            position: relative; z-index: 2;
            padding: 40px 24px 48px;
            width: 100%; max-width: 860px; margin: 0 auto;
        }
        .hero-tag {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 12px; font-weight: 800; letter-spacing: .18em; text-transform: uppercase;
            color: #67e8f9; margin-bottom: 16px;
        }
        .hero-tag::before { content:''; width:28px; height:2px; background:#67e8f9; }
        .hero-name {
            font-size: clamp(1.8rem, 5vw, 3.2rem);
            font-weight: 900; color: white; line-height: 1.15;
            margin-bottom: 8px;
        }
        .hero-sub { font-size: clamp(14px, 2.5vw, 18px); color: #7dd3fc; font-weight: 600; margin-bottom: 20px; }
        .hero-quote {
            font-size: clamp(13px, 2vw, 15px); color: rgba(255,255,255,.65);
            font-style: italic; max-width: 520px; line-height: 1.7; margin-bottom: 28px;
            border-left: 3px solid #0ea5e9; padding-left: 14px;
        }
        .hero-socials { display: flex; gap: 10px; flex-wrap: wrap; }
        .hero-social {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 8px 16px; border-radius: 40px;
            font-size: 13px; font-weight: 700; text-decoration: none;
            border: 1.5px solid rgba(255,255,255,.25); color: rgba(255,255,255,.85);
            transition: all .2s;
        }
        .hero-social:hover { background: rgba(255,255,255,.15); border-color: rgba(255,255,255,.5); }
        .hero-badges {
            position: absolute; top: 24px; right: 24px; z-index: 3;
            display: flex; flex-direction: column; gap: 8px; align-items: flex-end;
        }
        .hero-badge {
            padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: 800;
            letter-spacing: .05em; white-space: nowrap;
        }

        /* ── Sticky Nav ── */
        .sticky-nav {
            position: sticky; top: 57px; z-index: 90;
            background: white; border-bottom: 1px solid #e0f2fe;
            padding: 0 20px;
        }
        .sticky-nav-inner {
            max-width: 860px; margin: 0 auto;
            display: flex; gap: 0; overflow-x: auto; scrollbar-width: none;
        }
        .sticky-nav-inner::-webkit-scrollbar { display: none; }
        .nav-tab {
            flex-shrink: 0; padding: 16px 20px;
            font-size: 13px; font-weight: 700; text-decoration: none;
            color: #64748b; border-bottom: 3px solid transparent;
            transition: all .2s; white-space: nowrap;
        }
        .nav-tab:hover { color: #0ea5e9; }
        .nav-tab.active { color: #0ea5e9; border-bottom-color: #0ea5e9; }

        /* ── Page wrapper ── */
        .page { max-width: 860px; margin: 0 auto; padding: 40px 20px 80px; display: flex; flex-direction: column; gap: 32px; }

        /* ── Section cards ── */
        .card { background: white; border-radius: 20px; padding: 32px 28px; border: 1px solid #e0f2fe; box-shadow: 0 4px 20px -4px rgba(14,165,233,.08); }
        @media(max-width: 480px) { .card { padding: 20px 16px; } }

        .section-label {
            display: flex; align-items: center; gap: 12px; margin-bottom: 24px;
        }
        .section-label-icon {
            width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center;
            font-size: 18px; flex-shrink: 0;
        }
        .section-label h2 { font-size: clamp(18px, 3vw, 22px); font-weight: 900; color: #0f172a; }
        .section-label p { font-size: 12px; color: #64748b; margin-top: 2px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; }

        /* ── Vision box ── */
        .vision-box {
            border-radius: 20px; padding: 28px;
            background: linear-gradient(135deg,#0c4a6e,#1e3a5f);
            color: white; position: relative; overflow: hidden;
        }
        .vision-box::before {
            content: '"'; position: absolute; top: -20px; left: 16px;
            font-size: 140px; font-weight: 900; color: rgba(255,255,255,.06); line-height: 1;
        }
        .vision-box p { font-size: clamp(15px, 2.5vw, 18px); font-weight: 700; line-height: 1.7; position: relative; }
        .vision-box span { font-size: 13px; color: #7dd3fc; margin-top: 12px; display: block; font-weight: 600; }

        /* ── Profile info grid ── */
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        @media(max-width: 540px) { .info-grid { grid-template-columns: 1fr; } }
        .info-item { background: #f8fafc; border-radius: 14px; padding: 14px 16px; border: 1px solid #e2e8f0; }
        .info-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 4px; }
        .info-value { font-size: 14px; font-weight: 700; color: #0f172a; }

        /* ── Achievement cards ── */
        .award-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        @media(max-width: 540px) { .award-grid { grid-template-columns: 1fr; } }
        .award-card { border-radius: 16px; padding: 20px; border: 2px solid; }

        /* ── Tables ── */
        .table-wrap { overflow-x: auto; border-radius: 14px; border: 1px solid #e0f2fe; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead tr { background: linear-gradient(135deg,#0ea5e9,#6366f1); }
        thead th { padding: 12px 16px; text-align: left; font-weight: 700; color: white; font-size: 13px; white-space: nowrap; }
        tbody tr { border-bottom: 1px solid #f0f9ff; transition: background .15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f0f9ff; }
        tbody td { padding: 12px 16px; vertical-align: top; color: #334155; line-height: 1.5; }
        tbody td:first-child { font-weight: 700; color: #64748b; width: 40px; }
        .cert-link { color: #0ea5e9; font-weight: 700; text-decoration: none; white-space: nowrap; }
        .cert-link:hover { text-decoration: underline; }

        /* ── Org / Karya list ── */
        .styled-list { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .styled-list li {
            display: flex; align-items: flex-start; gap: 12px;
            background: #f8fafc; border-radius: 14px; padding: 14px 16px;
            border: 1px solid #e2e8f0; font-size: 14px; color: #334155; line-height: 1.6;
        }
        .styled-list li::before {
            content: ''; width: 8px; height: 8px; border-radius: 50%;
            background: #0ea5e9; margin-top: 6px; flex-shrink: 0;
        }
        .list-link { color: #0ea5e9; font-weight: 700; text-decoration: none; margin-left: 4px; }
        .list-link:hover { text-decoration: underline; }

        /* ── Implementation ── */
        .impl-intro { background: linear-gradient(135deg,#ecfeff,#eff6ff); border-radius: 16px; padding: 24px; border: 1px solid #bae6fd; margin-bottom: 24px; }
        .impl-intro h3 { font-size: 17px; font-weight: 800; color: #0c4a6e; margin-bottom: 8px; }
        .impl-intro p { font-size: 14px; color: #334155; line-height: 1.7; }
        .gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; }
        .gallery-item img { width: 100%; aspect-ratio: 16/9; object-fit: cover; border-radius: 14px; transition: transform .3s; display: block; }
        .gallery-item:hover img { transform: scale(1.03); }
        .gallery-item iframe { width: 100%; aspect-ratio: 16/9; border-radius: 14px; display: block; }
        .gallery-caption { font-size: 13px; font-weight: 600; color: #475569; text-align: center; margin-top: 10px; }

        /* ── CTA Buttons ── */
        .cta-row { display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; margin-top: 32px; }
        .cta-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 28px; border-radius: 14px;
            font-size: 14px; font-weight: 800; text-decoration: none; transition: all .2s;
        }
        .cta-primary { background: linear-gradient(135deg,#0ea5e9,#6366f1); color: white; box-shadow: 0 8px 25px -6px rgba(14,165,233,.4); }
        .cta-primary:hover { box-shadow: 0 12px 30px -6px rgba(14,165,233,.5); transform: translateY(-2px); }
        .cta-green { background: linear-gradient(135deg,#10b981,#059669); color: white; box-shadow: 0 8px 25px -6px rgba(16,185,129,.4); }
        .cta-green:hover { transform: translateY(-2px); }

        /* ── Footer ── */
        .port-footer {
            border-radius: 20px; padding: 36px 24px; text-align: center;
            background: linear-gradient(135deg,#0c4a6e,#1e1b4b);
            color: white;
        }
        .port-footer h3 { font-size: 18px; font-weight: 900; margin-bottom: 6px; }
        .port-footer p { font-size: 13px; color: #93c5fd; }

        /* ── Responsiveness helpers ── */
        @media(max-width: 640px) {
            .hero-badges { display: none; }
            .hero-content { padding: 28px 16px 36px; }
            thead th:nth-child(4) { display: none; }
            tbody td:nth-child(4) { display: none; }
        }
    </style>
</head>
<body>

    {{-- ── TOP NAV ── --}}
    <div class="topbar">
        <span class="topbar-brand">kodi.app </span>
        <a href="{{ url('/') }}" class="topbar-back">← Beranda</a>
    </div>

    {{-- ── HERO ── --}}
    <div class="hero">
        <img src="{{ asset('storage/poto.jpeg') }}" alt="Risda Ayulia Apandi">
        <div class="hero-overlay"></div>

        {{-- Floating badges --}}
        <div class="hero-badges">
            <span class="hero-badge" style="background:linear-gradient(135deg,#0ea5e9,#6366f1);color:white">
                ★ The Future Leader
            </span>
            <span class="hero-badge" style="background:rgba(255,255,255,.15);color:white;border:1px solid rgba(255,255,255,.3)">
                Guru Penggerak Digital
            </span>
            <span class="hero-badge" style="background:rgba(234,179,8,.9);color:#1c1917">
                Juara 1 Video Pembelajaran 2025
            </span>
        </div>

        <div class="hero-content">
            <div class="hero-tag fade-up">Pendidik &amp; Inovator Digital</div>
            <h1 class="hero-name fade-up2">Risda Ayulia Apandi, S.Pd.</h1>
            <p class="hero-sub fade-up2">Guru SD Negeri Pasirjeungjing · Kab. Tasikmalaya</p>
            <blockquote class="hero-quote fade-up3">
                "Mendidik bukan sekadar mengajar — ini tentang menyalakan api semangat belajar yang akan terus menyinari masa depan generasi digital Indonesia."
            </blockquote>
            <div class="hero-socials fade-up3">
                <a href="https://www.instagram.com/risdaap24" target="_blank" class="hero-social">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    @risdaap24
                </a>
                <a href="https://www.tiktok.com/@risdaap24" target="_blank" class="hero-social">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.73a4.85 4.85 0 01-1.01-.04z"/></svg>
                    @risdaap24
                </a>
                <a href="https://whatsapp.com/channel/0029Vay0hFn2v1IrMtLECk0M" target="_blank" class="hero-social">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp Channel
                </a>
                <a href="mailto:apandirisda24@gmail.com" class="hero-social">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Email
                </a>
            </div>
        </div>
    </div>

    {{-- ── STICKY NAV ── --}}
    <nav class="sticky-nav" id="main-nav">
        <div class="sticky-nav-inner">
            <a href="#profil"        class="nav-tab active" data-target="profil">1. Profil Guru</a>
            <a href="#portofolio"    class="nav-tab"        data-target="portofolio">2. Portofolio</a>
            <a href="#implementasi"  class="nav-tab"        data-target="implementasi">3. Bukti Implementasi</a>
        </div>
    </nav>

    {{-- ── CONTENT ── --}}
    <div class="page">

        {{-- Vision box --}}
        <div class="vision-box fade-up">
            <p>"Saya percaya bahwa setiap anak adalah pemimpin masa depan. Tugas saya adalah membekali mereka dengan literasi digital, kemampuan berpikir kritis, dan keberanian untuk berinovasi sejak dini."</p>
            <span>— Risda Ayulia Apandi, S.Pd. · Guru Koding &amp; Inovator kodi.app</span>
        </div>

        {{-- ══ SECTION 1: PROFIL ══ --}}
        <section id="profil" class="scroll-mt-28">
            <div class="card">
                <div class="section-label">
                    <div class="section-label-icon" style="background:#ecfeff">
                        <svg width="20" height="20" fill="none" stroke="#0ea5e9" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <h2>Profil Guru</h2>
                        <p>Identitas &amp; Informasi Kontak</p>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">Risda Ayulia Apandi, S.Pd.</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">NUPTK</div>
                        <div class="info-value">5556776677230063</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">NIP</div>
                        <div class="info-value">199812242024212018</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Sekolah</div>
                        <div class="info-value">SDN Pasirjeungjing</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Kabupaten</div>
                        <div class="info-value">Tasikmalaya</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">apandirisda24@gmail.com</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">WhatsApp</div>
                        <div class="info-value">0819-9587-7373</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Instagram / TikTok</div>
                        <div class="info-value">@risdaap24</div>
                    </div>
                </div>

                {{-- Achievements highlight --}}
                <div style="margin-top:28px">
                    <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#64748b;margin-bottom:14px">Prestasi &amp; Penghargaan</p>
                    <div class="award-grid">
                        <div class="award-card" style="border-color:#fde68a;background:#fffbeb">
                            <div style="font-size:24px;margin-bottom:8px">🥇</div>
                            <p style="font-size:14px;font-weight:800;color:#78350f">Juara 1 Video Pembelajaran</p>
                            <p style="font-size:12px;color:#92400e;margin-top:4px">Tingkat Kecamatan Cigalontang · PGRI 2025</p>
                        </div>
                        <div class="award-card" style="border-color:#c7d2fe;background:#eef2ff">
                            <div style="font-size:24px;margin-bottom:8px">🥈</div>
                            <p style="font-size:14px;font-weight:800;color:#3730a3">Juara 2 Lomba Inovasi Pembelajaran</p>
                            <p style="font-size:12px;color:#4338ca;margin-top:4px">Jenjang SD · PORSENIJAR PGRI Kab. Tasikmalaya 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ══ SECTION 2: PORTOFOLIO ══ --}}
        <section id="portofolio" class="scroll-mt-28">
            <div class="card">
                <div class="section-label">
                    <div class="section-label-icon" style="background:#f0f9ff">
                        <svg width="20" height="20" fill="none" stroke="#0ea5e9" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <h2>Portofolio Guru</h2>
                        <p>Pengembangan Diri, Organisasi &amp; Karya</p>
                    </div>
                </div>

                {{-- A. Pengembangan Diri --}}
                <h3 style="font-size:16px;font-weight:800;color:#0c4a6e;margin-bottom:16px;padding-bottom:10px;border-bottom:2px solid #e0f2fe">
                    A. Kegiatan Pengembangan Diri (2023–2025)
                </h3>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Tahun</th>
                                <th>Penyelenggara</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                [1,'Pelatihan Koding dan Kecerdasan Artifisial Fase C','2025','Koding Next','https://drive.google.com/file/d/12Ab1Nr5GMl6qFUmmr6MeuA5CXbIGJY6r/view?usp=sharing'],
                                [2,'Coaching Clinic Penyusunan Sasaran Kinerja Pegawai (SKP)','2024','BKPSDM Kabupaten Tasikmalaya','https://drive.google.com/file/d/1qe1rDQzdIuRh4XNYmiDOPE8GZCzyvfLx/view?usp=sharing'],
                                [3,'Webinar ASN Belajar: Pembentukan Produk Hukum Daerah','2024','BKPSDM Kabupaten Tasikmalaya','https://drive.google.com/file/d/15H2nDjV8DtPHQBDZtWr_zJHMystNf6fE/view?usp=sharing'],
                                [4,'Membangun Peran dan Kesadaran ASN dalam Sikap Perilaku Bela Negara','2024','BKPSDM Kabupaten Tasikmalaya','https://drive.google.com/file/d/1FF6zQe-iXbNiv8_YWvpN5obMfqWW0Epn/view'],
                                [5,'Webinar Berbagi Praktik Baik Lomba Tingkat I Pangkalan SDN Pasirjeungjing','2024','Komunitas Belajar Kompas Bumi – PMM Kemendikbudristek','https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing'],
                                [6,'Webinar Nasional Integrasi Akun Belajar.id dengan Quizizz Super','2024','Studio Bahana Ajar, Belajar Bersama & Edukarya','https://drive.google.com/file/d/1vPPi3cEVzrAZMX-OuUugOdzylCzmSRE8/view?usp=sharing'],
                                [7,'Praktik Baik: Solusi Mudah Optimalisasi Ide Guru untuk Kegiatan Literasi dan Numerasi Sekolah','2024','Rekan Guru Belajar Bersama & Edukarya','https://drive.google.com/file/d/1d-kSd8abW8hs3DvK9DXaqqTiFiz3mR1c/view'],
                                [8,'Sosialisasi Pokok-Pokok Manajemen ASN','2024','BKPSDM Kabupaten Tasikmalaya','https://drive.google.com/file/d/1mSkK0-UHcRxErSFITm3bLLoezZ0puXlt/view'],
                                [9,'Praktik Baik: Strategi Meningkatkan Literasi dan Numerasi Siswa pada Rapor Pendidikan Melalui Hasil AKM','2024','Belajar Bersama','https://drive.google.com/file/d/1_QqqR9i6nTtTG9KeIhUo9YJjndMeXRh7/view?usp=sharing'],
                                [10,'Pelatihan Mandiri Kurikulum Merdeka (30 JP)','2024','Direktorat Jenderal GTK Kemendikbudristek','https://drive.google.com/file/d/1ozKIfksKV5uu_Wz-OqEqC3G6DsQJK4kt/view?usp=sharing'],
                                [11,'Workshop RKT/RAKS Berbasis Data (PBD): Penguatan Profil Pelajar Pancasila dan Pembelajaran Terdiferensiasi','2024','MKKS SMP Wilayah Singaparna','https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing'],
                                [12,'Webinar Seni Rupa dan Karakteristik Seni Rupa Anak','2024','Kombel Kompas Bumi','https://drive.google.com/file/d/1EKPe8yijhsu-5yFlkELNpYkKBPrUzEd2/view'],
                                [13,'PEMBATIK Level 2 – Implementasi Pembelajaran Berbasis TIK (32 JP)','2023','Kemendikbudristek – Balai Layanan Platform Teknologi','https://drive.google.com/file/d/1EdNOizibq2rpJc3CvUHSoDlmrhHFlJ3m/view?usp=sharing'],
                                [14,'PEMBATIK Level 1 – Literasi TIK (32 JP)','2023','Kemendikbudristek – Balai Layanan Platform Teknologi','https://drive.google.com/file/d/1Ee_sfGqqFJCHGXFT72xXiCBh2LMka24S/view?usp=sharing'],
                            ] as [$no,$kegiatan,$tahun,$penyelenggara,$link])
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $kegiatan }}</td>
                                <td style="white-space:nowrap;font-weight:700;color:#0ea5e9">{{ $tahun }}</td>
                                <td>{{ $penyelenggara }}</td>
                                <td><a href="{{ $link }}" target="_blank" rel="noopener" class="cert-link">Sertifikat ↗</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- B. Organisasi --}}
                <h3 style="font-size:16px;font-weight:800;color:#0c4a6e;margin:32px 0 16px;padding-bottom:10px;border-bottom:2px solid #e0f2fe">
                    B. Pengalaman Organisasi Profesi
                </h3>
                <ul class="styled-list">
                    <li>Anggota Aktif PGRI Kabupaten Tasikmalaya (2023 – sekarang)</li>
                    <li>Pembina Ekstrakurikuler Robotika SDN Pasirjeungjing</li>
                </ul>

                {{-- C. Karya Tulis --}}
                <h3 style="font-size:16px;font-weight:800;color:#0c4a6e;margin:32px 0 16px;padding-bottom:10px;border-bottom:2px solid #e0f2fe">
                    C. Karya Tulis &amp; Inovasi
                </h3>
                <ul class="styled-list">
                    <li>
                        <span><strong>Inovasi Utama:</strong> "Kodi.app – Media Pembelajaran Interaktif Koding dan Kecerdasan Artifisial"
                        <a href="https://kodi.beryu.my.id/kodi_app/public" target="_blank" class="list-link">Kunjungi →</a></span>
                    </li>
                    <li>Artikel "Inovasi Pembelajaran Digital Kodi.app pada Pembelajaran Koding dan Kecerdasan Artifisial di SDN Pasirjeungjing" – (2025)</li>
                    <li>"Membuat Keyakinan Kelas"
                        <a href="https://drive.google.com/file/d/1-JDnk9DcYI1RQNwyL7h94aE95knClMHE/view" target="_blank" class="list-link">Lihat Karya →</a>
                    </li>
                    <li>Perencanaan Pembelajaran Mendalam: Membuat Lampu Lalu Lintas Koding dan Kecerdasan Artifisial (KKA)
                        <a href="https://docs.google.com/document/d/1Q3Fs0RekJnd-IFhUvdJ9wLYOeThOKqR_/view" target="_blank" class="list-link">Lihat Karya →</a>
                    </li>
                    <li>Modul Ajar IPAS
                        <a href="https://drive.google.com/file/d/1WhuNzZ2-5ANXadfr4Dl2zhbdGYL4zHT3/view" target="_blank" class="list-link">Lihat Karya →</a>
                    </li>
                    <li>Modul Ajar Kurikulum Merdeka Pembelajaran Koding Kelas 5
                        <a href="https://drive.google.com/file/d/1v2p-XF90CpEvMvq0xg7qpQdgMq0ldZrT/view" target="_blank" class="list-link">Lihat Karya →</a>
                    </li>
                </ul>
            </div>
        </section>

        {{-- ══ SECTION 3: IMPLEMENTASI ══ --}}
        <section id="implementasi" class="scroll-mt-28">
            <div class="card">
                <div class="section-label">
                    <div class="section-label-icon" style="background:#f0fdf4">
                        <svg width="20" height="20" fill="none" stroke="#10b981" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h2>Bukti Implementasi</h2>
                        <p>Dokumentasi Karya Inovasi di Kelas</p>
                    </div>
                </div>

                <div class="impl-intro">
                    <h3>Kodi.app – Media Pembelajaran Koding dan Kecerdasan Artifisial</h3>
                    <p>Media ini mengajak siswa kelas 5 belajar koding dengan menelaah e-modul berbagai materi koding dan KA, serta melakukan evaluasi melalui game dan kuis yang terintegrasi. Siswa menjadi lebih percaya diri dalam logika pemrograman dan berpikir komputasional.</p>
                </div>

                <div class="gallery">
                    <div class="gallery-item">
                        <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank">
                            <img src="{{ asset('storage/p1.png') }}" alt="Kegiatan Pembelajaran">
                        </a>
                        <p class="gallery-caption">Foto Kegiatan Pembelajaran</p>
                    </div>
                    <div class="gallery-item">
                        <iframe src="https://www.youtube.com/embed/pbXckDIJ-zY?start=250&rel=0&modestbranding=1"
                                title="Video Implementasi" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        <p class="gallery-caption" style="color:#0ea5e9">Video Implementasi di Kelas</p>
                    </div>
                    <div class="gallery-item">
                        <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank">
                            <img src="{{ asset('storage/p2.png') }}" alt="Hasil Proyek Siswa">
                        </a>
                        <p class="gallery-caption">Hasil Proyek Siswa</p>
                    </div>
                </div>

                <div class="cta-row">
                    <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank" class="cta-btn cta-primary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        Dokumentasi Google Drive
                    </a>
                    <a href="https://whatsapp.com/channel/0029Vay0hFn2v1IrMtLECk0M" target="_blank" class="cta-btn cta-green">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Saluran WhatsApp
                    </a>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <div class="port-footer">
            <h3>Portofolio Digital</h3>
            <p style="margin-top:4px">Risda Ayulia Apandi, S.Pd. — Guru SDN Pasirjeungjing, Kab. Tasikmalaya</p>
            <p style="margin-top:8px;color:#475569">© 2025 · Dibuat dengan dedikasi penuh untuk pendidikan Indonesia</p>
        </div>

    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll('.nav-tab');
        const sections = ['profil', 'portofolio', 'implementasi'];

        function setActive(id) {
            tabs.forEach(t => {
                t.classList.toggle('active', t.getAttribute('data-target') === id);
            });
        }

        tabs.forEach(t => t.addEventListener('click', () => {
            setTimeout(() => setActive(t.getAttribute('data-target')), 80);
        }));

        window.addEventListener('scroll', () => {
            let current = sections[0];
            sections.forEach(id => {
                const el = document.getElementById(id);
                if (el && el.getBoundingClientRect().top <= 160) current = id;
            });
            setActive(current);
        }, { passive: true });
    });
    </script>

</body>
</html>
