<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Proyek Saya</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-6">
                <p class="text-sm text-slate-500">{{ $proyeks->count() }} proyek dikumpulkan</p>
                <a href="{{ route('siswa.proyek.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Kumpulkan Proyek
                </a>
            </div>

            @forelse($proyeks as $p)
                <div class="bg-white rounded-xl border border-slate-200 p-5 mb-4 flex items-start gap-4 hover:border-indigo-200 transition-colors">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                        {{ $p->status === 'dinilai' ? 'bg-green-100' : 'bg-amber-100' }}">
                        @if($p->status === 'dinilai')
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-semibold text-slate-800 truncate">{{ $p->judul }}</h3>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                {{ $p->status === 'dinilai' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                {{ $p->status === 'dinilai' ? 'Sudah Dinilai' : 'Menunggu' }}
                            </span>
                        </div>
                        @if($p->emodule)
                            <p class="text-xs text-slate-400 mb-1">Modul: {{ $p->emodule->judul }}</p>
                        @endif
                        @if($p->status === 'dinilai' && $p->penilaian)
                            <p class="text-sm text-green-700 font-medium">
                                Nilai: {{ $p->penilaian->nilai }}/100
                                @if($p->penilaian->poin_bonus > 0)
                                    · +{{ $p->penilaian->poin_bonus }} koin bonus
                                @endif
                            </p>
                        @endif
                        <p class="text-xs text-slate-400 mt-1">{{ $p->created_at->format('d M Y') }}</p>
                    </div>
                    <a href="{{ route('siswa.proyek.show', $p->id) }}"
                       class="flex-shrink-0 px-3 py-1.5 text-xs font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                        Detail →
                    </a>
                </div>
            @empty
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium">Belum ada proyek</p>
                    <p class="text-sm text-slate-400 mt-1">Kumpulkan proyek pertamamu!</p>
                    <a href="{{ route('siswa.proyek.create') }}"
                       class="inline-block mt-4 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Kumpulkan Sekarang
                    </a>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
