<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('guru.latihan.index') }}"
               class="inline-flex items-center justify-center w-8 h-8 bg-white border border-slate-200 hover:bg-slate-50 rounded-lg transition-colors">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-semibold text-slate-800">{{ $latihan->nama }}</h2>
                <p class="text-sm text-slate-500 mt-0.5">
                    {{ \Carbon\Carbon::parse($latihan->tanggal)->translatedFormat('d M Y') }}
                    &middot; {{ $latihan->tingkat_kesulitan }}
                    &middot; {{ $latihan->kuis->count() }} soal
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            @foreach($latihan->kuis as $index => $soal)
                <div class="bg-white rounded-xl border border-slate-200 p-6">

                    <div class="flex items-start justify-between mb-3">
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Soal {{ $index + 1 }}</span>
                        <div class="flex items-center gap-2">
                            @if($soal->emodule)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                    {{ $soal->emodule->judul }}
                                </span>
                            @endif
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                {{ $soal->poin }} poin
                            </span>
                        </div>
                    </div>

                    <p class="text-base font-medium text-slate-800 mb-4">{{ $soal->pertanyaan }}</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'] as $key => $label)
                            <div class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm
                                {{ strtolower($soal->jawaban_benar) === $key
                                    ? 'bg-emerald-50 border border-emerald-200 text-emerald-800'
                                    : 'bg-slate-50 border border-slate-200 text-slate-700' }}">
                                <span class="font-semibold w-5 flex-shrink-0
                                    {{ strtolower($soal->jawaban_benar) === $key ? 'text-emerald-600' : 'text-slate-500' }}">
                                    {{ $label }}.
                                </span>
                                {{ $soal->{'pilihan_' . $key} }}
                                @if(strtolower($soal->jawaban_benar) === $key)
                                    <svg class="w-4 h-4 text-emerald-500 ml-auto flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end">
                <form action="{{ route('guru.latihan.destroy', $latihan) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Hapus latihan ini beserta semua soalnya?')"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus Latihan Ini
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
