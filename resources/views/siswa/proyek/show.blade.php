<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Detail Proyek</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-5">
                <a href="{{ route('siswa.proyek.index') }}"
                   class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>

            {{-- Info Proyek --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 mb-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-800">{{ $proyek->judul }}</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                        {{ $proyek->status === 'dinilai' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                        {{ $proyek->status === 'dinilai' ? 'Sudah Dinilai' : 'Menunggu Penilaian' }}
                    </span>
                </div>

                @if($proyek->emodule)
                    <p class="text-sm text-slate-500 mb-2">
                        <span class="font-medium text-slate-700">Modul:</span> {{ $proyek->emodule->judul }}
                    </p>
                @endif

                @if($proyek->deskripsi)
                    <p class="text-sm text-slate-600 leading-relaxed mb-4">{{ $proyek->deskripsi }}</p>
                @endif

                <a href="{{ $proyek->link_proyek }}" target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Buka Link Proyek
                </a>

                <p class="text-xs text-slate-400 mt-4">Dikumpulkan {{ $proyek->created_at->format('d M Y, H:i') }}</p>
            </div>

            {{-- Hasil Penilaian --}}
            @if($proyek->status === 'dinilai' && $proyek->penilaian)
                <div class="bg-white rounded-xl border border-green-200 p-6">
                    <h4 class="font-semibold text-green-800 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Hasil Penilaian
                    </h4>
                    <div class="flex items-center gap-6 mb-4">
                        <div class="text-center">
                            <p class="text-4xl font-bold text-green-600">{{ $proyek->penilaian->nilai }}</p>
                            <p class="text-xs text-slate-500 mt-1">dari 100</p>
                        </div>
                        @if($proyek->penilaian->poin_bonus > 0)
                            <div class="text-center">
                                <p class="text-4xl font-bold text-amber-500">+{{ $proyek->penilaian->poin_bonus }}</p>
                                <p class="text-xs text-slate-500 mt-1">koin bonus</p>
                            </div>
                        @endif
                    </div>
                    @if($proyek->penilaian->komentar)
                        <div class="p-4 bg-green-50 rounded-lg">
                            <p class="text-sm font-medium text-slate-700 mb-1">Komentar Guru:</p>
                            <p class="text-sm text-slate-600 leading-relaxed">{{ $proyek->penilaian->komentar }}</p>
                        </div>
                    @endif
                    <p class="text-xs text-slate-400 mt-3">
                        Dinilai oleh {{ $proyek->penilaian->guru->nama_lengkap ?? $proyek->penilaian->guru->name }}
                        · {{ $proyek->penilaian->updated_at->format('d M Y') }}
                    </p>
                </div>
            @else
                <div class="bg-amber-50 rounded-xl border border-amber-200 p-6 text-center">
                    <svg class="w-10 h-10 text-amber-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-medium text-amber-800">Menunggu penilaian guru</p>
                    <p class="text-xs text-amber-600 mt-1">Guru akan segera memeriksa proyekmu</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
