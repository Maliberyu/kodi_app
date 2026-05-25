<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('siswa.kuis.index') }}"
               class="inline-flex items-center justify-center w-8 h-8 bg-white border border-slate-200 hover:bg-slate-50 rounded-lg transition-colors">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-semibold text-slate-800">{{ $emodul->judul }}</h2>
                <p class="text-sm text-slate-500 mt-0.5">{{ $kuis->count() }} soal tersedia</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($kuis->count() > count($sudahDijawab))

                <form method="POST" action="{{ route('siswa.kuis.jawab') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="emodul_id" value="{{ $emodul->id }}">

                    @foreach($kuis as $index => $soal)
                        <div class="bg-white rounded-xl border border-slate-200 p-6">

                            <p class="text-sm font-semibold text-slate-500 mb-2">Soal {{ $index + 1 }}</p>
                            <p class="text-base font-medium text-slate-800 mb-5">{{ $soal->pertanyaan }}</p>

                            @if(in_array($soal->id, $sudahDijawab))
                                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Sudah dijawab
                                </div>
                            @else
                                <div class="space-y-2">
                                    @foreach(['A', 'B', 'C', 'D'] as $pilihan)
                                        @php $field = 'pilihan_' . strtolower($pilihan); @endphp
                                        <label class="flex items-center gap-3 p-3.5 border border-slate-200 rounded-lg cursor-pointer hover:border-indigo-300 hover:bg-indigo-50 transition-all has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50">
                                            <input type="radio"
                                                   name="jawaban_{{ $soal->id }}"
                                                   value="{{ $pilihan }}"
                                                   required
                                                   class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-slate-300">
                                            <span class="text-sm text-slate-700">
                                                <span class="font-semibold text-indigo-600">{{ $pilihan }}.</span>
                                                {{ $soal->$field }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                <input type="hidden" name="kuis_id[]" value="{{ $soal->id }}">
                            @endif
                        </div>
                    @endforeach

                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('siswa.kuis.index') }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            Kembali
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition-colors">
                            Kirim Jawaban
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>
                    </div>
                </form>

            @else
                <div class="bg-white rounded-xl border border-emerald-200 p-10 text-center">
                    <div class="w-12 h-12 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-slate-800 mb-1">Semua soal telah dikerjakan</p>
                    <p class="text-sm text-slate-500 mb-5">Kamu sudah menyelesaikan semua soal pada modul ini.</p>
                    <a href="{{ route('siswa.kuis.hasil') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Lihat Hasil Kuis
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
