<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('ortu.home') }}"
               class="inline-flex items-center justify-center w-8 h-8 bg-white border border-slate-200 hover:bg-slate-50 rounded-lg transition-colors">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-semibold text-slate-800">Progres {{ $anak->name }}</h2>
                <p class="text-sm text-slate-500 mt-0.5">Detail perkembangan belajar</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($progress->isEmpty())
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium">Belum ada data kuis</p>
                    <p class="text-sm text-slate-400 mt-1">{{ $anak->name }} belum mengerjakan kuis apapun</p>
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <h3 class="font-semibold text-slate-800 text-sm">Progress per Modul</h3>
                    </div>
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Modul</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Soal</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Poin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($progress as $p)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 text-slate-700 font-medium">Modul #{{ $p->modul_id }}</td>
                                    <td class="px-6 py-4 text-center text-slate-600">{{ $p->total_soal }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700">
                                            {{ $p->poin }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
