<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">🏆 Papan Ranking</h2>
    </x-slot>

    <style>
        @keyframes popIn { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
        .row-pop { animation: popIn .3s ease forwards; opacity:0; }
        @keyframes glowPulse { 0%,100%{box-shadow:0 0 0 0 rgba(99,102,241,.4)} 50%{box-shadow:0 0 0 8px rgba(99,102,241,0)} }
        .saya-glow { animation: glowPulse 2.5s infinite; }
    </style>

    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Posisi Saya --}}
            <div class="relative overflow-hidden rounded-3xl p-6 text-white"
                 style="background:linear-gradient(135deg,#6366f1,#7c3aed);box-shadow:0 20px 50px -12px rgba(99,102,241,.45)">
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full" style="background:rgba(255,255,255,.08)"></div>
                <div class="flex items-center justify-between relative">
                    <div>
                        <p class="text-xs font-medium mb-1" style="color:rgba(199,210,254,1)">Posisi kamu sekarang</p>
                        <p class="text-5xl font-extrabold text-white">#{{ $posinSaya }}</p>
                        <p class="text-xs mt-1" style="color:rgba(199,210,254,1)">
                            @if($posinSaya == 1) 👑 Kamu juara 1! Luar biasa!
                            @elseif($posinSaya <= 3) 🥈 Hampir juara! Tetap semangat!
                            @elseif($posinSaya <= 10) 🔥 Top 10! Kamu bisa lebih tinggi!
                            @else 💪 Yuk, kerjakan lebih banyak kuis!
                            @endif
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-medium mb-1" style="color:rgba(199,210,254,1)">Total Poinmu</p>
                        <p class="text-4xl font-extrabold text-white">{{ number_format($poinSaya) }}</p>
                        <p class="text-xs mt-1" style="color:rgba(199,210,254,1)">⭐ poin</p>
                    </div>
                </div>
            </div>

            {{-- Podium Top 3 --}}
            @if($ranking->count() >= 3)
                @php $top = $ranking->take(3)->values(); @endphp
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-center font-extrabold text-slate-700 text-sm mb-6">🏆 Top 3 Terbaik</h3>
                    <div class="flex items-end justify-center gap-6">
                        {{-- Urutan: 2, 1, 3 --}}
                        @foreach([1, 0, 2] as $idx)
                            @if(isset($top[$idx]))
                                @php
                                    $s = $top[$idx];
                                    $isSaya = $s->id === auth()->id();
                                    $heights  = ['h-16','h-24','h-12'];
                                    $podiumBg = ['background:linear-gradient(180deg,#94a3b8,#64748b)','background:linear-gradient(180deg,#fbbf24,#f59e0b)','background:linear-gradient(180deg,#fb923c,#f97316)'];
                                    $crowns   = ['🥈','👑','🥉'];
                                    $colors   = ['#64748b','#d97706','#ea580c'];
                                @endphp
                                <div class="flex flex-col items-center">
                                    <div class="text-xl mb-1">{{ $crowns[$idx] }}</div>
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-lg font-extrabold mb-2 border-4 border-white shadow-lg {{ $isSaya ? 'saya-glow' : '' }}"
                                         style="{{ $isSaya ? 'background:#6366f1;color:white' : 'background:#e0e7ff;color:#3730a3' }}">
                                        {{ strtoupper(substr($s->name, 0, 1)) }}
                                    </div>
                                    <p class="text-xs font-bold text-slate-700 text-center max-w-[72px] truncate">
                                        {{ $isSaya ? 'Kamu' : Str::limit($s->nama_lengkap ?? $s->name, 10) }}
                                    </p>
                                    <p class="text-xs font-extrabold mb-2" style="color:{{ $colors[$idx] }}">
                                        {{ number_format($s->total_poin) }} ⭐
                                    </p>
                                    <div class="w-20 {{ $heights[$idx] }} rounded-t-2xl flex items-center justify-center" style="{{ $podiumBg[$idx] }}">
                                        <span class="text-white font-extrabold text-lg">{{ $idx + 1 }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Daftar Lengkap --}}
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-2">
                    <span>📋</span>
                    <h3 class="font-extrabold text-slate-800 text-sm">Semua Siswa</h3>
                </div>
                @if($ranking->isEmpty())
                    <div class="py-16 text-center">
                        <div class="text-5xl mb-3">📭</div>
                        <p class="text-slate-400 text-sm">Belum ada data ranking</p>
                    </div>
                @else
                    <div class="divide-y divide-slate-100">
                        @foreach($ranking as $i => $siswa)
                            @php $isSaya = $siswa->id === auth()->id(); @endphp
                            <div class="row-pop px-5 py-3.5 flex items-center gap-3 transition-colors"
                                 style="{{ $isSaya ? 'background:#eef2ff;border-left:4px solid #6366f1' : '' }}"
                                 onmouseenter="{{ $isSaya ? '' : 'this.style.background=\"#f8fafc\"' }}"
                                 onmouseleave="{{ $isSaya ? '' : 'this.style.background=\"\"' }}"
                                 style="animation-delay:{{ $i * 0.04 }}s;{{ $isSaya ? 'background:#eef2ff;border-left:4px solid #6366f1;' : '' }}">
                                <div class="w-9 flex-shrink-0 text-center">
                                    @if($siswa->posisi === 1) <span class="text-xl">👑</span>
                                    @elseif($siswa->posisi === 2) <span class="text-xl">🥈</span>
                                    @elseif($siswa->posisi === 3) <span class="text-xl">🥉</span>
                                    @else <span class="text-sm font-bold text-slate-400">#{{ $siswa->posisi }}</span>
                                    @endif
                                </div>
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-extrabold flex-shrink-0 {{ $isSaya ? 'saya-glow' : '' }}"
                                     style="{{ $isSaya ? 'background:#6366f1;color:white' : 'background:#e0e7ff;color:#3730a3' }}">
                                    {{ strtoupper(substr($siswa->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">
                                        {{ $siswa->nama_lengkap ?? $siswa->name }}
                                        @if($isSaya) <span class="text-xs font-normal" style="color:#6366f1">(Kamu)</span> @endif
                                    </p>
                                    <p class="text-xs text-slate-400">{{ $siswa->kelas ?? '-' }} · 🔥 {{ $siswa->streak }}</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="font-extrabold text-sm" style="{{ $isSaya ? 'color:#6366f1' : 'color:#1e293b' }}">
                                        {{ number_format($siswa->total_poin) }}
                                    </p>
                                    <p class="text-xs text-slate-400">⭐</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
