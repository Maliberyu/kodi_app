<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Daftar E-Module</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('guru.e-modul.index') }}" class="mb-4 flex flex-wrap items-center gap-3">
                <div class="relative">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari judul modul..."
                           class="pl-9 pr-4 py-2.5 border border-slate-300 rounded-lg text-sm w-52 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>
                <select name="klasifikasi" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    <option value="">Semua Klasifikasi</option>
                    @foreach($klasifikasiList as $opt)
                        <option value="{{ $opt }}" {{ request('klasifikasi') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Filter
                </button>
                @if(request('search') || request('klasifikasi'))
                    <a href="{{ route('guru.e-modul.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm rounded-lg transition-colors">
                        Reset
                    </a>
                @endif
            </form>

            <div class="mb-5 flex items-center gap-3">
                <a href="{{ route('guru.home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('guru.e-modul.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Modul
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($modules as $m)
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-sm hover:border-indigo-200 transition-all duration-200">

                        <div class="flex items-start justify-between mb-3">
                            <h3 class="font-semibold text-slate-800 text-base leading-snug">{{ $m->judul }}</h3>
                        </div>

                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                            {{ $m->klasifikasi }}
                        </span>

                        @if($m->keterangan)
                            <p class="text-sm text-slate-500 mt-3 leading-relaxed">
                                {{ Str::limit($m->keterangan, 100) }}
                            </p>
                        @endif

                        <div class="mt-5 flex items-center gap-2">
                            @if($m->pdf_link)
                            <a href="{{ $m->pdf_link }}" target="_blank"
                               class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Buka PDF
                            </a>
                            @endif
                            <a href="{{ route('guru.e-modul.edit', $m) }}"
                               class="inline-flex items-center justify-center p-2 bg-white border border-slate-200 hover:bg-indigo-50 hover:border-indigo-200 text-slate-500 hover:text-indigo-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                            <form action="{{ route('guru.e-modul.destroy', $m->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus modul ini?')"
                                        class="inline-flex items-center justify-center p-2 bg-white border border-slate-200 hover:bg-red-50 hover:border-red-200 text-slate-500 hover:text-red-600 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white rounded-xl border border-slate-200 p-16 text-center">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <p class="text-slate-500 font-medium mb-2">Belum ada modul</p>
                        <a href="{{ route('guru.e-modul.create') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">
                            Tambah modul pertama
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
