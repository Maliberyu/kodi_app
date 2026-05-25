<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Ranking Siswa</h2>
        <p class="text-sm text-slate-500 mt-0.5">Peringkat berdasarkan total poin kuis</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Statistik ringkas -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 p-5 text-center">
                    <p class="text-2xl font-bold text-slate-800">{{ $totalSiswa }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">Total Siswa</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-5 text-center">
                    <p class="text-2xl font-bold text-slate-800">{{ $totalModul }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">E-Modul Aktif</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-5 text-center">
                    <p class="text-2xl font-bold text-slate-800">{{ $totalSoal }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">Total Soal Kuis</p>
                </div>
            </div>

            <!-- Tabel ranking -->
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-semibold text-slate-800 text-sm">Papan Peringkat</h3>
                    <span class="text-xs text-slate-400">Diperbarui setiap halaman dimuat</span>
                </div>

                @if($ranking->isEmpty())
                    <div class="px-6 py-16 text-center">
                        <p class="text-slate-400 text-sm">Belum ada siswa yang mengerjakan kuis</p>
                    </div>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider w-16">No.</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Streak</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Poin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($ranking as $siswa)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        @if($siswa->posisi <= 3)
                                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-xs font-bold
                                                {{ $siswa->posisi === 1 ? 'bg-amber-100 text-amber-700' :
                                                   ($siswa->posisi === 2 ? 'bg-slate-100 text-slate-600' :
                                                   'bg-orange-100 text-orange-600') }}">
                                                {{ $siswa->posisi }}
                                            </span>
                                        @else
                                            <span class="text-slate-400 pl-1">{{ $siswa->posisi }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center text-xs font-semibold flex-shrink-0">
                                                {{ strtoupper(substr($siswa->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-800">{{ $siswa->nama_lengkap ?? $siswa->name }}</p>
                                                <p class="text-xs text-slate-400">{{ $siswa->nama_sekolah ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">{{ $siswa->kelas ?? '-' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-600">
                                            <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"/>
                                            </svg>
                                            {{ $siswa->streak }} hari
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="font-bold text-indigo-600 text-base">{{ number_format($siswa->total_poin) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
