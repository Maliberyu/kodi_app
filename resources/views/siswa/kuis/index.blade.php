<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Pilih Modul untuk Kuis</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Poin & Hasil -->
            <div class="bg-indigo-600 rounded-xl p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-white">
                <div>
                    <p class="text-sm font-medium text-indigo-200">Total Poin Kamu</p>
                    <p class="text-4xl font-bold mt-0.5">
                        {{ \App\Models\JawabanKuis::where('user_id', auth()->id())->sum('poin_didapat') }}
                    </p>
                </div>
                <a href="{{ route('siswa.kuis.hasil') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-indigo-700 text-sm font-semibold rounded-lg hover:bg-indigo-50 transition-colors self-start sm:self-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Lihat Hasil Kuis
                </a>
            </div>

            <!-- Daftar Modul -->
            <div class="space-y-4">
                @forelse($emoduls as $emodul)
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-sm hover:border-indigo-200 transition-all duration-200">
                        <div class="p-5">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <h3 class="font-semibold text-slate-800">{{ $emodul->judul }}</h3>
                                    <p class="text-sm text-slate-500 mt-1">
                                        {{ $emodul->kuis_count }} soal tersedia &middot;
                                        <span class="text-indigo-600 font-medium">
                                            {{ \App\Models\JawabanKuis::where('user_id', auth()->id())->where('emodul_id', $emodul->id)->count() }} sudah dikerjakan
                                        </span>
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <a href="{{ route('siswa.kuis.hasil') }}#modul-{{ $emodul->id }}"
                                       class="inline-flex items-center gap-1.5 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Hasil
                                    </a>
                                    <a href="{{ route('siswa.kuis.kerjakan', $emodul) }}"
                                       class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                        </svg>
                                        Kerjakan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada kuis tersedia</p>
                        <p class="text-sm text-slate-400 mt-1">Tunggu guru menambahkan soal</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
