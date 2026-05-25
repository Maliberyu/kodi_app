<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Papan Peringkat</h2>
        <p class="text-sm text-slate-500 mt-0.5">Lihat posisimu dibanding teman-teman</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Posisiku -->
            <div class="bg-indigo-600 rounded-xl p-6 mb-6 text-white flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-indigo-200">Posisiku</p>
                    <p class="text-4xl font-bold mt-0.5">#{{ $posinSaya }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-medium text-indigo-200">Total Poinku</p>
                    <p class="text-4xl font-bold mt-0.5">{{ number_format($poinSaya) }}</p>
                </div>
            </div>

            <!-- Daftar ranking -->
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Semua Siswa</h3>
                </div>

                @if($ranking->isEmpty())
                    <div class="px-6 py-16 text-center">
                        <p class="text-slate-400 text-sm">Belum ada data ranking</p>
                    </div>
                @else
                    <div class="divide-y divide-slate-100">
                        @foreach($ranking as $siswa)
                            @php $isSaya = $siswa->id === auth()->id(); @endphp
                            <div class="px-6 py-4 flex items-center gap-4 {{ $isSaya ? 'bg-indigo-50' : 'hover:bg-slate-50' }} transition-colors">

                                <!-- Posisi -->
                                <div class="w-8 flex-shrink-0 text-center">
                                    @if($siswa->posisi === 1)
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">1</span>
                                    @elseif($siswa->posisi === 2)
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-slate-200 text-slate-600 text-xs font-bold">2</span>
                                    @elseif($siswa->posisi === 3)
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-orange-100 text-orange-600 text-xs font-bold">3</span>
                                    @else
                                        <span class="text-sm text-slate-400">{{ $siswa->posisi }}</span>
                                    @endif
                                </div>

                                <!-- Avatar & Nama -->
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-semibold flex-shrink-0
                                        {{ $isSaya ? 'bg-indigo-600 text-white' : 'bg-indigo-100 text-indigo-700' }}">
                                        {{ strtoupper(substr($siswa->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-slate-800 truncate">
                                            {{ $siswa->nama_lengkap ?? $siswa->name }}
                                            @if($isSaya)
                                                <span class="ml-1.5 text-xs font-normal text-indigo-600">(Kamu)</span>
                                            @endif
                                        </p>
                                        <p class="text-xs text-slate-400">{{ $siswa->kelas ?? 'Kelas -' }}</p>
                                    </div>
                                </div>

                                <!-- Streak -->
                                <div class="flex items-center gap-1 text-xs text-slate-500 flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"/>
                                    </svg>
                                    {{ $siswa->streak }}
                                </div>

                                <!-- Poin -->
                                <div class="text-right flex-shrink-0 w-20">
                                    <p class="font-bold text-base {{ $isSaya ? 'text-indigo-600' : 'text-slate-700' }}">
                                        {{ number_format($siswa->total_poin) }}
                                    </p>
                                    <p class="text-xs text-slate-400">poin</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
