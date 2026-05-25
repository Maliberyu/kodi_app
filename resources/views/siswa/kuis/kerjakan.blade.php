<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('siswa.kuis.index') }}"
               class="inline-flex items-center justify-center w-9 h-9 bg-white border-2 border-slate-200 hover:border-indigo-400 rounded-xl transition-colors text-base font-bold text-slate-600">
                ←
            </a>
            <div>
                <h2 class="text-lg font-bold text-slate-800">{{ $emodul->judul }}</h2>
                <p class="text-xs text-slate-500">{{ $kuis->count() }} soal tersedia</p>
            </div>
        </div>
    </x-slot>

    <style>
        @keyframes slideIn { from{opacity:0;transform:translateX(-16px)} to{opacity:1;transform:translateX(0)} }
        .soal-card { animation: slideIn .3s ease forwards; opacity:0; }
        .pilihan-label { transition: all .15s ease; cursor:pointer; }
        .pilihan-label:hover { border-color:#818cf8 !important; background:#eef2ff !important; }
        .pilihan-label.dipilih {
            background: linear-gradient(135deg,#6366f1,#8b5cf6) !important;
            border-color: transparent !important;
            transform: scale(1.01);
            box-shadow: 0 8px 20px -4px rgba(99,102,241,.35);
            color: white;
        }
        .pilihan-label.dipilih .teks-pilihan { color: white !important; }
        .pilihan-label.dipilih .huruf-badge { background: rgba(255,255,255,.25) !important; color:white !important; }
    </style>

    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 rounded-2xl text-sm font-medium flex items-center gap-2 border-2"
                     style="background:#f0fdf4;border-color:#86efac;color:#166534">
                    🎉 {{ session('success') }}
                </div>
            @endif

            @if($kuis->count() > count($sudahDijawab))
                @php
                    $total   = $kuis->count();
                    $dijawab = count($sudahDijawab);
                    $sisa    = $total - $dijawab;
                    $persen  = $total > 0 ? round(($dijawab / $total) * 100) : 0;
                @endphp

                {{-- Progress --}}
                <div class="bg-white rounded-2xl border border-slate-200 p-4 mb-5 flex items-center gap-4 shadow-sm">
                    <div class="flex-1">
                        <div class="flex justify-between text-xs text-slate-500 mb-1.5 font-medium">
                            <span>Progress kuis</span>
                            <span>{{ $dijawab }}/{{ $total }} dijawab</span>
                        </div>
                        <div class="h-3 rounded-full overflow-hidden" style="background:#f1f5f9">
                            <div class="h-full rounded-full transition-all duration-700"
                                 style="width:{{ $persen }}%;background:linear-gradient(90deg,#f97316,#ec4899)"></div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 text-center">
                        <p class="text-2xl font-extrabold" style="color:#f97316">{{ $sisa }}</p>
                        <p class="text-xs text-slate-400">sisa</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('siswa.kuis.jawab') }}" class="space-y-5" id="formKuis">
                    @csrf
                    <input type="hidden" name="emodul_id" value="{{ $emodul->id }}">

                    @foreach($kuis as $index => $soal)
                        <div class="soal-card bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100"
                             style="animation-delay:{{ $index * 0.07 }}s">
                            <div class="px-5 py-3 flex items-center gap-3"
                                 style="background:linear-gradient(135deg,#6366f1,#8b5cf6)">
                                <span class="w-8 h-8 rounded-xl flex items-center justify-center font-extrabold text-sm flex-shrink-0"
                                      style="background:rgba(255,255,255,.25);color:white">
                                    {{ $index + 1 }}
                                </span>
                                <span class="text-xs font-medium" style="color:rgba(224,231,255,1)">Soal ke-{{ $index + 1 }}</span>
                                @if(in_array($soal->id, $sudahDijawab))
                                    <span class="ml-auto text-xs font-bold px-3 py-1 rounded-full text-white"
                                          style="background:rgba(255,255,255,.25)">✅ Sudah dijawab</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <p class="text-base font-bold text-slate-800 leading-relaxed mb-5">{{ $soal->pertanyaan }}</p>

                                @if(in_array($soal->id, $sudahDijawab))
                                    <div class="flex items-center gap-2 rounded-2xl p-3 text-sm font-medium"
                                         style="background:#f0fdf4;color:#166534">
                                        ✅ Soal ini sudah kamu jawab
                                    </div>
                                @else
                                    @php
                                        $hurufBg = ['A'=>'linear-gradient(135deg,#3b82f6,#06b6d4)','B'=>'linear-gradient(135deg,#8b5cf6,#a855f7)','C'=>'linear-gradient(135deg,#f97316,#fbbf24)','D'=>'linear-gradient(135deg,#ef4444,#ec4899)'];
                                    @endphp
                                    <div class="space-y-3">
                                        @foreach(['A','B','C','D'] as $pilihan)
                                            @php $field = 'pilihan_' . strtolower($pilihan); @endphp
                                            <label class="pilihan-label flex items-center gap-3 p-4 border-2 border-slate-200 rounded-2xl"
                                                   data-soal="{{ $soal->id }}">
                                                <input type="radio"
                                                       name="jawaban_{{ $soal->id }}"
                                                       value="{{ $pilihan }}"
                                                       required
                                                       class="sr-only"
                                                       onchange="tandaiDipilih(this)">
                                                <span class="huruf-badge w-9 h-9 rounded-xl flex items-center justify-center font-extrabold text-sm text-white flex-shrink-0"
                                                      style="background:{{ $hurufBg[$pilihan] }}">
                                                    {{ $pilihan }}
                                                </span>
                                                <span class="teks-pilihan text-sm font-medium text-slate-700">{{ $soal->$field }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="kuis_id[]" value="{{ $soal->id }}">
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-between pt-2 pb-6">
                        <a href="{{ route('siswa.kuis.index') }}"
                           class="px-5 py-3 text-sm font-bold rounded-2xl transition"
                           style="background:#f1f5f9;color:#475569">
                            ← Kembali
                        </a>
                        <button type="submit"
                                class="px-8 py-3 text-white text-sm font-extrabold rounded-2xl transition flex items-center gap-2"
                                style="background:linear-gradient(135deg,#f97316,#ec4899);box-shadow:0 10px 30px -6px rgba(249,115,22,.5)">
                            🚀 Kirim Jawaban!
                        </button>
                    </div>
                </form>

            @else
                <div class="bg-white rounded-3xl p-12 text-center border-2" style="border-color:#a7f3d0;box-shadow:0 10px 40px -8px rgba(16,185,129,.2)">
                    <div class="text-7xl mb-4" style="animation:bounce 1s infinite">🎉</div>
                    <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Luar biasa!</h2>
                    <p class="text-slate-500 mb-6">Kamu sudah menyelesaikan semua soal. Kerja bagus!</p>
                    <a href="{{ route('siswa.kuis.hasil') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 text-white font-bold rounded-2xl transition"
                       style="background:linear-gradient(135deg,#10b981,#0d9488);box-shadow:0 8px 25px -4px rgba(16,185,129,.4)">
                        📊 Lihat Hasil Kuis
                    </a>
                </div>
            @endif

        </div>
    </div>

    <script>
    function tandaiDipilih(radio) {
        const soalId = radio.name.replace('jawaban_', '');
        document.querySelectorAll(`label[data-soal="${soalId}"]`).forEach(l => l.classList.remove('dipilih'));
        radio.closest('label').classList.add('dipilih');
    }
    </script>
</x-app-layout>
