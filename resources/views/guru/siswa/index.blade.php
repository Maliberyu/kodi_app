<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Data Siswa</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-5 flex flex-wrap items-center gap-3">
                <a href="{{ route('guru.home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>

                <form method="GET" action="{{ route('guru.siswa.index') }}" class="flex items-center gap-2 flex-1 max-w-sm">
                    <div class="relative flex-1">
                        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Cari nama, email, kelas..."
                               class="w-full pl-9 pr-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    </div>
                    <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('guru.siswa.index') }}" class="px-3 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm rounded-lg transition-colors">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            @if($siswa->isEmpty())
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium">Belum ada siswa yang terdaftar</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($siswa as $s)
                        <div x-data="{ open: false }"
                             class="bg-white rounded-xl border border-slate-200 p-5 hover:shadow-sm hover:border-indigo-200 transition-all duration-200">

                            <div class="flex items-center gap-3 cursor-pointer" @click="open = !open">
                                <div class="w-10 h-10 bg-indigo-100 text-indigo-700 flex items-center justify-center rounded-full font-semibold text-sm flex-shrink-0">
                                    {{ strtoupper(substr($s->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-800 truncate">{{ $s->name }}</p>
                                    <p class="text-xs text-slate-400 truncate">{{ $s->email }}</p>
                                </div>
                                <svg class="w-4 h-4 text-slate-400 flex-shrink-0 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>

                            <div x-show="open" x-collapse class="mt-4 pt-4 border-t border-slate-100 space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500">Nama</span>
                                    <span class="text-slate-800 font-medium">{{ $s->name }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500">Kelas</span>
                                    <span class="text-slate-800 font-medium">{{ $s->kelas ?? '-' }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500">Sekolah</span>
                                    <span class="text-slate-800 font-medium">{{ $s->nama_sekolah ?? '-' }}</span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
