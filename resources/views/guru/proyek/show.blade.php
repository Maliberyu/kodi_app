<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Nilai Proyek Siswa</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-5">
                <a href="{{ route('guru.proyek.index') }}"
                   class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Proyek
                </a>
            </div>

            {{-- Info Proyek --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 mb-5">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-sm font-bold text-indigo-700">
                        {{ $proyek->siswa->initials() }}
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">{{ $proyek->siswa->nama_lengkap ?? $proyek->siswa->name }}</p>
                        <p class="text-xs text-slate-400">{{ $proyek->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-slate-800 mb-2">{{ $proyek->judul }}</h3>

                @if($proyek->emodule)
                    <p class="text-sm text-slate-500 mb-2">Modul: {{ $proyek->emodule->judul }}</p>
                @endif

                @if($proyek->deskripsi)
                    <p class="text-sm text-slate-600 leading-relaxed mb-4">{{ $proyek->deskripsi }}</p>
                @endif

                <a href="{{ $proyek->link_proyek }}" target="_blank"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Buka Proyek Siswa
                </a>
            </div>

            {{-- Form Penilaian --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6">
                <h4 class="font-semibold text-slate-800 mb-5">
                    {{ $proyek->penilaian ? 'Update Penilaian' : 'Beri Penilaian' }}
                </h4>

                <form action="{{ route('guru.proyek.nilai', $proyek->id) }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Nilai <span class="text-slate-400">(0–100)</span>
                        </label>
                        <input type="number" name="nilai" min="0" max="100" required
                               value="{{ old('nilai', $proyek->penilaian?->nilai ?? '') }}"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        @error('nilai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Koin Bonus <span class="text-slate-400">(0–500)</span>
                        </label>
                        <input type="number" name="poin_bonus" min="0" max="500" required
                               value="{{ old('poin_bonus', $proyek->penilaian?->poin_bonus ?? 0) }}"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        <p class="text-xs text-slate-400 mt-1.5">Koin langsung masuk ke akun siswa</p>
                        @error('poin_bonus') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Komentar <span class="text-slate-400">(opsional)</span>
                        </label>
                        <textarea name="komentar" rows="3"
                                  placeholder="Apresiasi atau masukan untuk siswa..."
                                  class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none resize-none">{{ old('komentar', $proyek->penilaian?->komentar ?? '') }}</textarea>
                        @error('komentar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <button type="submit"
                                class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                            {{ $proyek->penilaian ? 'Update Penilaian' : 'Simpan Penilaian' }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
