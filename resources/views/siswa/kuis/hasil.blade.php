<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Riwayat & Hasil Kuis</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Total Poin -->
            <div class="bg-indigo-600 rounded-xl p-6 mb-6 text-white">
                <p class="text-sm font-medium text-indigo-200">Total Poin yang Kamu Kumpulkan</p>
                <p class="text-5xl font-bold mt-1">{{ $totalPoin }}</p>
                <p class="text-sm text-indigo-200 mt-1">Terus semangat belajar!</p>
            </div>

            <!-- Penguasaan Per Modul -->
            @if($analisisModul->count() > 0)
            <div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">
                <h3 class="font-semibold text-slate-800 mb-4">Penguasaan Materi per Modul</h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($analisisModul as $m)
                        @php
                            $maksPoin = $m->total_soal * 10;
                            $persen = $maksPoin > 0 ? round(($m->poin_didapat / $maksPoin) * 100) : 0;
                        @endphp
                        <div class="rounded-lg border p-4 {{ $persen >= 70 ? 'border-emerald-200 bg-emerald-50' : ($persen >= 40 ? 'border-amber-200 bg-amber-50' : 'border-red-200 bg-red-50') }}">
                            <p class="text-sm font-semibold text-slate-800 mb-1">{{ $m->judul_modul }}</p>
                            <p class="text-xs text-slate-500">
                                {{ round($m->poin_didapat / 10) }} benar dari {{ $m->total_soal }} soal
                            </p>
                            <div class="mt-2 flex items-center justify-between">
                                <div class="flex-1 bg-white rounded-full h-1.5 mr-3 overflow-hidden">
                                    <div class="h-full rounded-full {{ $persen >= 70 ? 'bg-emerald-500' : ($persen >= 40 ? 'bg-amber-500' : 'bg-red-500') }}"
                                         style="width: {{ $persen }}%"></div>
                                </div>
                                <span class="text-sm font-bold {{ $persen >= 70 ? 'text-emerald-700' : ($persen >= 40 ? 'text-amber-700' : 'text-red-700') }}">
                                    {{ $persen }}%
                                </span>
                            </div>
                            @if($persen < 70)
                                <p class="text-xs text-red-600 font-medium mt-2">Disarankan mengulang modul ini</p>
                            @else
                                <p class="text-xs text-emerald-600 font-medium mt-2">Materi sudah dikuasai</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Riwayat Jawaban -->
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Riwayat Jawaban</h3>
                </div>

                @forelse($hasil as $j)
                    <div id="modul-{{ $j->emodul_id }}" class="px-6 py-4 border-b border-slate-100 last:border-0 flex items-start justify-between gap-4">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-medium text-indigo-600 mb-1">
                                {{ $j->kuis->emodule?->judul ?? 'Latihan' }}
                            </p>
                            <p class="text-sm font-medium text-slate-800 leading-relaxed">
                                {{ Str::limit($j->kuis->pertanyaan ?? '-', 120) }}
                            </p>
                            <div class="flex items-center gap-3 mt-1.5">
                                <span class="text-xs text-slate-500">
                                    Jawaban: <span class="font-semibold text-slate-700">{{ $j->jawaban_siswa }}</span>
                                </span>
                                <span class="text-xs text-slate-400">{{ $j->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            @if($j->poin_didapat > 0)
                                <p class="text-lg font-bold text-emerald-600">+{{ $j->poin_didapat }}</p>
                                <p class="text-xs font-medium text-emerald-600">Benar</p>
                            @else
                                <p class="text-lg font-bold text-red-400">0</p>
                                <p class="text-xs font-medium text-red-400">Salah</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <p class="text-slate-500 font-medium mb-1">Belum ada riwayat kuis</p>
                        <a href="{{ route('siswa.kuis.index') }}"
                           class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">
                            Mulai kerjakan kuis
                        </a>
                    </div>
                @endforelse
            </div>

            @if($hasil->hasPages())
                <div class="mt-4">{{ $hasil->links() }}</div>
            @endif

        </div>
    </div>
</x-app-layout>
