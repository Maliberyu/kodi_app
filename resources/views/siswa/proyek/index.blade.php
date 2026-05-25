<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">🛠️ Proyek Saya</h2>
    </x-slot>

    <style>
        @keyframes popIn { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
        .card-pop { animation: popIn .35s ease forwards; opacity:0; }
        .proyek-card { transition: transform .2s ease, box-shadow .2s; }
        .proyek-card:hover { transform: translateY(-3px); box-shadow:0 12px 30px -8px rgba(0,0,0,.12); }
    </style>

    <div class="py-6">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            @if(session('success'))
                <div class="p-4 rounded-2xl text-sm font-medium flex items-center gap-2 border-2"
                     style="background:#f0fdf4;border-color:#86efac;color:#166534">
                    🎉 {{ session('success') }}
                </div>
            @endif

            {{-- Banner --}}
            <div class="relative overflow-hidden rounded-3xl p-6 text-white"
                 style="background:linear-gradient(135deg,#a855f7,#7c3aed);box-shadow:0 20px 50px -12px rgba(168,85,247,.4)">
                <div class="absolute -top-6 -right-6 w-28 h-28 rounded-full" style="background:rgba(255,255,255,.08)"></div>
                <div class="flex items-center justify-between gap-4 relative">
                    <div>
                        <h2 class="text-xl font-extrabold text-white">Proyek Kodingku</h2>
                        <p class="text-sm mt-1" style="color:rgba(233,213,255,1)">Kumpulkan karyamu dan dapatkan penilaian dari guru! 🚀</p>
                        <p class="text-xs mt-1" style="color:rgba(216,180,254,1)">{{ $proyeks->count() }} proyek dikumpulkan</p>
                    </div>
                    <div class="text-5xl">🛠️</div>
                </div>
                <a href="{{ route('siswa.proyek.create') }}"
                   class="mt-4 inline-flex items-center gap-2 px-5 py-2.5 text-sm font-extrabold rounded-2xl transition"
                   style="background:white;color:#7c3aed">
                    ➕ Kumpulkan Proyek Baru
                </a>
            </div>

            {{-- Daftar --}}
            @forelse($proyeks as $i => $p)
                <div class="proyek-card card-pop bg-white rounded-3xl overflow-hidden border-2 shadow-sm"
                     style="border-color:{{ $p->status === 'dinilai' ? '#a7f3d0' : '#e2e8f0' }};animation-delay:{{ $i * 0.08 }}s">
                    <div class="flex items-stretch">
                        <div class="w-2 flex-shrink-0"
                             style="background:{{ $p->status === 'dinilai' ? 'linear-gradient(180deg,#10b981,#0d9488)' : 'linear-gradient(180deg,#f59e0b,#f97316)' }}"></div>
                        <div class="flex-1 p-5">
                            <div class="flex items-start gap-3">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-2xl flex-shrink-0"
                                     style="{{ $p->status === 'dinilai' ? 'background:#d1fae5' : 'background:#fef3c7' }}">
                                    {{ $p->status === 'dinilai' ? '✅' : '⏳' }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h3 class="font-extrabold text-slate-800 truncate">{{ $p->judul }}</h3>
                                        <span class="text-xs font-bold px-2.5 py-0.5 rounded-full"
                                              style="{{ $p->status === 'dinilai' ? 'background:#d1fae5;color:#065f46' : 'background:#fef3c7;color:#92400e' }}">
                                            {{ $p->status === 'dinilai' ? '✅ Sudah Dinilai' : '⏳ Menunggu' }}
                                        </span>
                                    </div>
                                    @if($p->emodule)
                                        <p class="text-xs text-slate-400 mt-0.5">📚 {{ $p->emodule->judul }}</p>
                                    @endif
                                    @if($p->status === 'dinilai' && $p->penilaian)
                                        <div class="flex items-center gap-3 mt-2">
                                            <span class="text-lg font-extrabold" style="color:#10b981">{{ $p->penilaian->nilai }}/100</span>
                                            @if($p->penilaian->poin_bonus > 0)
                                                <span class="text-sm font-bold" style="color:#d97706">🪙 +{{ $p->penilaian->poin_bonus }} koin</span>
                                            @endif
                                        </div>
                                    @endif
                                    <p class="text-xs text-slate-400 mt-1">{{ $p->created_at->format('d M Y') }}</p>
                                </div>
                                <a href="{{ route('siswa.proyek.show', $p->id) }}"
                                   class="flex-shrink-0 px-4 py-2 text-xs font-bold rounded-xl transition"
                                   style="{{ $p->status === 'dinilai' ? 'background:#d1fae5;color:#065f46' : 'background:#f1f5f9;color:#475569' }}">
                                    Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-3xl border border-slate-200 p-16 text-center shadow-sm">
                    <div class="text-7xl mb-4">🚀</div>
                    <h3 class="text-xl font-extrabold text-slate-700 mb-2">Belum ada proyek</h3>
                    <p class="text-sm text-slate-400 mb-6">Kumpulkan proyek coding pertamamu!</p>
                    <a href="{{ route('siswa.proyek.create') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 text-white font-extrabold rounded-2xl transition"
                       style="background:linear-gradient(135deg,#a855f7,#7c3aed);box-shadow:0 8px 25px -4px rgba(168,85,247,.4)">
                        ➕ Kumpulkan Sekarang
                    </a>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
