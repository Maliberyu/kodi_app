<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">📊 Hasil Kuis</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Total Poin --}}
            <div class="relative overflow-hidden rounded-3xl p-8 text-white text-center"
                 style="background:linear-gradient(135deg,#10b981,#0d9488,#0891b2);box-shadow:0 20px 50px -12px rgba(16,185,129,.45)">
                <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full" style="background:rgba(255,255,255,.08)"></div>
                <div class="relative">
                    <div class="text-5xl mb-2">🏆</div>
                    <p class="text-sm font-medium" style="color:rgba(167,243,208,1)">Total Poin Terkumpul</p>
                    <p class="text-6xl font-extrabold mt-1 text-white">{{ $totalPoin }}</p>
                    <p class="text-sm mt-2" style="color:rgba(167,243,208,1)">Terus belajar, kamu hebat! 🌟</p>
                </div>
            </div>

            {{-- Penguasaan Per Modul --}}
            @if($analisisModul->count() > 0)
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="font-extrabold text-slate-800 mb-5 flex items-center gap-2">
                        <span>🧩</span> Penguasaan Materi per Modul
                    </h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($analisisModul as $m)
                            @php
                                $maksPoin = $m->total_soal * 10;
                                $persen   = $maksPoin > 0 ? round(($m->poin_didapat / $maksPoin) * 100) : 0;
                                $bintang  = $persen >= 90 ? '⭐⭐⭐' : ($persen >= 60 ? '⭐⭐' : '⭐');
                                if($persen >= 70)      { $bg='#f0fdf4'; $border='#86efac'; $bar='#10b981'; $label='✅ Dikuasai'; $lc='#065f46'; }
                                elseif($persen >= 40)  { $bg='#fffbeb'; $border='#fcd34d'; $bar='#f59e0b'; $label='📖 Perlu latihan'; $lc='#92400e'; }
                                else                   { $bg='#fef2f2'; $border='#fca5a5'; $bar='#ef4444'; $label='🔁 Ulangi modul'; $lc='#991b1b'; }
                            @endphp
                            <div class="rounded-2xl border-2 p-4" style="background:{{ $bg }};border-color:{{ $border }}">
                                <div class="flex items-start justify-between mb-1">
                                    <p class="text-sm font-bold text-slate-800 leading-tight">{{ $m->judul_modul }}</p>
                                    <span class="text-sm">{{ $bintang }}</span>
                                </div>
                                <p class="text-xs text-slate-500 mb-2">{{ round($m->poin_didapat / 10) }} benar / {{ $m->total_soal }} soal</p>
                                <div class="h-2.5 rounded-full overflow-hidden mb-2" style="background:rgba(255,255,255,.7)">
                                    <div class="h-full rounded-full" style="width:{{ $persen }}%;background:{{ $bar }}"></div>
                                </div>
                                <p class="text-xs font-bold" style="color:{{ $lc }}">{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Riwayat --}}
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-2">
                    <span>📋</span>
                    <h3 class="font-extrabold text-slate-800 text-sm">Riwayat Jawaban</h3>
                </div>
                @forelse($hasil as $j)
                    <div id="modul-{{ $j->emodul_id }}"
                         class="px-6 py-4 border-b border-slate-100 last:border-0 flex items-start justify-between gap-4 hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-3 flex-1 min-w-0">
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center text-sm flex-shrink-0 mt-0.5"
                                 style="{{ $j->poin_didapat > 0 ? 'background:#d1fae5' : 'background:#fee2e2' }}">
                                {{ $j->poin_didapat > 0 ? '✅' : '❌' }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold mb-0.5" style="color:#4f46e5">
                                    {{ $j->kuis->emodule?->judul ?? 'Latihan' }}
                                </p>
                                <p class="text-sm font-medium text-slate-800 leading-relaxed">
                                    {{ Str::limit($j->kuis->pertanyaan ?? '-', 110) }}
                                </p>
                                <p class="text-xs text-slate-400 mt-1">
                                    Jawaban: <span class="font-bold text-slate-600">{{ $j->jawaban_siswa }}</span>
                                    · {{ $j->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            @if($j->poin_didapat > 0)
                                <p class="text-xl font-extrabold" style="color:#10b981">+{{ $j->poin_didapat }}</p>
                                <p class="text-xs font-bold" style="color:#10b981">Benar 🎯</p>
                            @else
                                <p class="text-xl font-extrabold" style="color:#ef4444">0</p>
                                <p class="text-xs font-bold" style="color:#ef4444">Salah</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center">
                        <div class="text-6xl mb-4">📭</div>
                        <p class="font-bold text-slate-600">Belum ada riwayat kuis</p>
                        <a href="{{ route('siswa.kuis.index') }}"
                           class="inline-block mt-3 px-5 py-2.5 text-sm font-bold rounded-2xl text-white transition"
                           style="background:linear-gradient(135deg,#f97316,#ec4899)">
                            🚀 Mulai Kerjakan Kuis
                        </a>
                    </div>
                @endforelse
            </div>

            @if($hasil->hasPages())
                <div class="mt-2">{{ $hasil->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
