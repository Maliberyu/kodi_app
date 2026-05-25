<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Daftar Latihan</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-5 flex items-center gap-3">
                <a href="{{ route('guru.kuis.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Ke Daftar Soal
                </a>
                <p class="text-sm text-slate-500">Latihan dibuat dari soal kuis yang sudah ada</p>
            </div>

            @if($latihan->count() === 0)
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium mb-1">Belum ada latihan</p>
                    <p class="text-sm text-slate-400 mb-4">Buat latihan baru dari halaman daftar soal kuis</p>
                    <a href="{{ route('guru.kuis.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Buka Daftar Soal
                    </a>
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama Latihan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Kesulitan</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Jumlah Soal</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($latihan as $item)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-medium text-slate-800">{{ $item->nama }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $badge = match($item->tingkat_kesulitan) {
                                                'Mudah'  => 'bg-emerald-50 text-emerald-700',
                                                'Sedang' => 'bg-amber-50 text-amber-700',
                                                'Sulit'  => 'bg-red-50 text-red-700',
                                                default  => 'bg-slate-50 text-slate-700',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badge }}">
                                            {{ $item->tingkat_kesulitan }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-slate-700 font-semibold">
                                        {{ $item->kuis_count }} soal
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('guru.latihan.show', $item) }}"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-medium rounded-lg transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Detail
                                            </a>
                                            <form action="{{ route('guru.latihan.destroy', $item) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Hapus latihan {{ $item->nama }}?')"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 hover:bg-red-50 hover:border-red-200 text-slate-500 hover:text-red-600 text-xs font-medium rounded-lg transition-colors">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4 border-t border-slate-100">
                        {{ $latihan->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
