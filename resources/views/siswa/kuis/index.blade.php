<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">🎯 Pilih Kuis</h2>
    </x-slot>

    <style>
        @keyframes popIn { from{opacity:0;transform:translateY(15px)} to{opacity:1;transform:translateY(0)} }
        .card-pop { animation: popIn .35s ease forwards; opacity:0; }
        .kuis-card { transition: transform .2s ease, box-shadow .2s; }
        .kuis-card:hover { transform: translateY(-4px); box-shadow: 0 16px 35px -8px rgba(0,0,0,.12); }
    </style>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Banner --}}
            <div class="relative overflow-hidden rounded-3xl p-6 text-white"
                 style="background:linear-gradient(135deg,#f97316,#ec4899,#e11d48);box-shadow:0 20px 50px -12px rgba(249,115,22,.4)">
                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full" style="background:rgba(255,255,255,.08)"></div>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm" style="color:rgba(254,215,170,1)">Total Poin Terkumpul</p>
                        <p class="text-5xl font-extrabold mt-0.5 text-white">
                            {{ \App\Models\JawabanKuis::where('user_id', auth()->id())->sum('poin_didapat') }}
                        </p>
                        <p class="text-xs mt-1" style="color:rgba(254,215,170,1)">⭐ Terus semangat!</p>
                    </div>
                    <div class="flex flex-col gap-2 items-end">
                        <div class="text-5xl">🎯</div>
                        <a href="{{ route('siswa.kuis.hasil') }}"
                           class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-bold rounded-xl transition"
                           style="background:white;color:#ea580c">
                            📊 Lihat Hasil
                        </a>
                    </div>
                </div>
            </div>

            <h3 class="text-sm font-bold text-slate-600 flex items-center gap-2">
                <span>📋</span> Pilih modul untuk dikerjakan
            </h3>

            @forelse($emoduls as $i => $emodul)
                @php
                    $sudah  = \App\Models\JawabanKuis::where('user_id', auth()->id())->where('emodul_id', $emodul->id)->count();
                    $total  = $emodul->kuis_count;
                    $persen = $total > 0 ? round(($sudah / $total) * 100) : 0;
                    $selesai = $sudah >= $total && $total > 0;
                    $barColor = $persen >= 100 ? '#10b981' : ($persen >= 50 ? '#f59e0b' : '#ef4444');
                @endphp
                <div class="kuis-card card-pop bg-white rounded-3xl p-5 border-2"
                     style="border-color: {{ $selesai ? '#a7f3d0' : '#e2e8f0' }}; animation-delay: {{ $i * 0.08 }}s">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                        <div class="flex items-center gap-4 flex-1">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl flex-shrink-0"
                                 style="{{ $selesai ? 'background:#d1fae5' : 'background:linear-gradient(135deg,#f97316,#ec4899)' }}">
                                {{ $selesai ? '✅' : '📝' }}
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-800">{{ $emodul->judul }}</h3>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $sudah }} dari {{ $total }} soal dikerjakan</p>
                                <div class="mt-2 h-2.5 rounded-full overflow-hidden w-full max-w-xs" style="background:#f1f5f9">
                                    <div class="h-full rounded-full transition-all duration-700"
                                         style="width:{{ $persen }}%;background:{{ $barColor }}"></div>
                                </div>
                                <p class="text-xs mt-0.5 font-medium" style="color:{{ $barColor }}">
                                    {{ $persen }}% selesai {{ $selesai ? '🎉' : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <a href="{{ route('siswa.kuis.hasil') }}#modul-{{ $emodul->id }}"
                               class="px-4 py-2.5 text-xs font-bold rounded-xl transition"
                               style="background:#f1f5f9;color:#475569">
                                📊 Hasil
                            </a>
                            @if(!$selesai)
                                <a href="{{ route('siswa.kuis.kerjakan', $emodul) }}"
                                   class="px-5 py-2.5 text-xs font-bold rounded-xl text-white transition"
                                   style="background:linear-gradient(135deg,#f97316,#ec4899);box-shadow:0 6px 20px -4px rgba(249,115,22,.5)">
                                    🚀 Kerjakan!
                                </a>
                            @else
                                <span class="px-5 py-2.5 text-xs font-bold rounded-xl" style="background:#d1fae5;color:#065f46">
                                    ✅ Selesai
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-3xl border border-slate-200 p-16 text-center">
                    <div class="text-6xl mb-4">📭</div>
                    <p class="font-bold text-slate-600">Belum ada kuis tersedia</p>
                    <p class="text-sm text-slate-400 mt-1">Tunggu guru menambahkan soal ya!</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
