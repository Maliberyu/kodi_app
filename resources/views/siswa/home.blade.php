<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Beranda</h2>
    </x-slot>

    <style>
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        @keyframes popIn { from{opacity:0;transform:scale(.85) translateY(10px)} to{opacity:1;transform:scale(1) translateY(0)} }
        .float-anim { animation: float 3s ease-in-out infinite; }
        .pop-in { animation: popIn .4s cubic-bezier(.175,.885,.32,1.275) forwards; opacity:0; }
        .menu-card { transition: transform .25s cubic-bezier(.175,.885,.32,1.275), box-shadow .25s; }
        .menu-card:hover { transform: translateY(-6px) scale(1.03); }
    </style>

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ===== HERO BANNER ===== --}}
            <div class="relative overflow-hidden rounded-3xl p-8 text-white"
                 style="background: linear-gradient(135deg, #7c3aed 0%, #9333ea 50%, #4f46e5 100%); box-shadow: 0 20px 50px -12px rgba(124,58,237,.5);">
                <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full" style="background:rgba(255,255,255,.08)"></div>
                <div class="absolute -bottom-8 -left-8 w-36 h-36 rounded-full" style="background:rgba(255,255,255,.05)"></div>
                <div class="absolute top-4 right-32 w-8 h-8 rounded-full" style="background:rgba(253,224,71,.25)"></div>

                <div class="relative flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium mb-1" style="color:rgba(221,214,254,1)">Selamat datang kembali! 👋</p>
                        <h1 class="text-3xl font-extrabold leading-tight text-white">
                            Halo, {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}!
                        </h1>
                        <p class="mt-2 text-sm" style="color:rgba(221,214,254,1)">Ayo belajar koding hari ini dan kumpulkan poin sebanyak-banyaknya!</p>
                    </div>
                    <div class="text-6xl float-anim hidden sm:block select-none">🚀</div>
                </div>

                {{-- Stats --}}
                <div class="relative mt-6 grid grid-cols-3 gap-3">
                    <div class="rounded-2xl p-3 text-center" style="background:rgba(255,255,255,.15)">
                        <p class="text-2xl font-extrabold text-white">
                            {{ \App\Models\JawabanKuis::where('user_id', auth()->id())->sum('poin_didapat') }}
                        </p>
                        <p class="text-xs mt-0.5" style="color:rgba(221,214,254,1)">⭐ Total Poin</p>
                    </div>
                    <div class="rounded-2xl p-3 text-center" style="background:rgba(255,255,255,.15)">
                        <p class="text-2xl font-extrabold text-white">{{ auth()->user()->streak ?? 0 }}</p>
                        <p class="text-xs mt-0.5" style="color:rgba(221,214,254,1)">🔥 Hari Streak</p>
                    </div>
                    <div class="rounded-2xl p-3 text-center" style="background:rgba(255,255,255,.15)">
                        <p class="text-2xl font-extrabold text-white">{{ auth()->user()->koin ?? 0 }}</p>
                        <p class="text-xs mt-0.5" style="color:rgba(221,214,254,1)">🪙 Koin</p>
                    </div>
                </div>
            </div>

            {{-- ===== MENU BELAJAR ===== --}}
            <div>
                <h2 class="text-base font-bold text-slate-700 mb-3 flex items-center gap-2">
                    <span>🎮</span> Menu Belajar
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">

                    <a href="{{ route('siswa.modules') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#3b82f6,#06b6d4);box-shadow:0 10px 30px -8px rgba(59,130,246,.5);animation-delay:.05s">
                        <div class="text-4xl mb-3">📚</div>
                        <h3 class="font-bold text-base">E-Modul</h3>
                        <p class="text-xs mt-1" style="color:rgba(219,234,254,1)">Baca materi & tonton video</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Buka →</div>
                    </a>

                    <a href="{{ route('siswa.kuis.index') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#f97316,#ec4899);box-shadow:0 10px 30px -8px rgba(249,115,22,.5);animation-delay:.1s">
                        <div class="text-4xl mb-3">🎯</div>
                        <h3 class="font-bold text-base">Kuis</h3>
                        <p class="text-xs mt-1" style="color:rgba(254,215,170,1)">Kerjakan soal, kumpulkan poin</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Main →</div>
                    </a>

                    <a href="{{ route('siswa.quizizz.index') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#10b981,#0d9488);box-shadow:0 10px 30px -8px rgba(16,185,129,.5);animation-delay:.15s">
                        <div class="text-4xl mb-3">🎮</div>
                        <h3 class="font-bold text-base">Quizizz</h3>
                        <p class="text-xs mt-1" style="color:rgba(167,243,208,1)">Mainkan kuis interaktif</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Main →</div>
                    </a>

                    <a href="{{ route('siswa.proyek.index') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#a855f7,#7c3aed);box-shadow:0 10px 30px -8px rgba(168,85,247,.5);animation-delay:.2s">
                        <div class="text-4xl mb-3">🛠️</div>
                        <h3 class="font-bold text-base">Proyek</h3>
                        <p class="text-xs mt-1" style="color:rgba(233,213,255,1)">Kumpulkan karya kodingmu</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Lihat →</div>
                    </a>

                    <a href="{{ route('siswa.playground.index') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#eab308,#f97316);box-shadow:0 10px 30px -8px rgba(234,179,8,.5);animation-delay:.25s">
                        <div class="text-4xl mb-3">⚡</div>
                        <h3 class="font-bold text-base">Playground</h3>
                        <p class="text-xs mt-1" style="color:rgba(254,240,138,1)">Coding drag & drop seru!</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Coba →</div>
                    </a>

                    <a href="{{ route('siswa.ranking') }}"
                       class="menu-card pop-in block rounded-2xl p-5 text-white" style="background:linear-gradient(135deg,#f43f5e,#dc2626);box-shadow:0 10px 30px -8px rgba(244,63,94,.5);animation-delay:.3s">
                        <div class="text-4xl mb-3">🏆</div>
                        <h3 class="font-bold text-base">Ranking</h3>
                        <p class="text-xs mt-1" style="color:rgba(254,205,211,1)">Lihat posisimu di papan skor</p>
                        <div class="mt-3 text-xs font-semibold rounded-full px-3 py-1 inline-block" style="background:rgba(255,255,255,.2)">Cek →</div>
                    </a>

                </div>
            </div>

            {{-- Motivasi --}}
            <div class="rounded-2xl p-5 flex items-center gap-4 border" style="background:#fffbeb;border-color:#fcd34d">
                <div class="text-4xl">💡</div>
                <div>
                    <p class="font-bold text-sm" style="color:#78350f">Tahukah kamu?</p>
                    <p class="text-sm mt-0.5" style="color:#92400e">Koding adalah bahasa masa depan. Setiap baris kode yang kamu tulis hari ini, adalah langkah menuju mimpi besarmu! 🌟</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
