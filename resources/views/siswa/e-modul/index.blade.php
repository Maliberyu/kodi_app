<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Daftar E-Modul</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('siswa.modules') }}" class="mb-4 flex flex-wrap items-center gap-3">
                <div class="relative flex-1 max-w-xs">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari modul..."
                           class="pl-9 pr-4 py-2.5 border border-slate-300 rounded-lg text-sm w-full focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>
                @if($klasifikasiList->isNotEmpty())
                <select name="klasifikasi" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    <option value="">Semua Topik</option>
                    @foreach($klasifikasiList as $opt)
                        <option value="{{ $opt }}" {{ request('klasifikasi') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
                @endif
                <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Cari
                </button>
                @if(request('search') || request('klasifikasi'))
                    <a href="{{ route('siswa.modules') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm rounded-lg transition-colors">
                        Reset
                    </a>
                @endif
            </form>

            <div class="mb-5">
                <a href="{{ route('siswa.home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <div x-data="{ videoOpen: false, videoSrc: '', videoTitle: '' }" class="relative">

                {{-- Modal Video --}}
                <div x-show="videoOpen" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4"
                     @keydown.escape.window="videoOpen = false; videoSrc = ''">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3 border-b border-slate-100">
                            <h3 class="font-semibold text-slate-800 text-sm" x-text="videoTitle"></h3>
                            <button @click="videoOpen = false; videoSrc = ''"
                                    class="p-1.5 hover:bg-slate-100 rounded-lg transition-colors text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <div class="aspect-video w-full">
                            <iframe class="w-full h-full" :src="videoSrc"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($modules as $m)
                        <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-sm hover:border-indigo-200 transition-all duration-200 flex flex-col">

                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                    {{ $m->klasifikasi }}
                                </span>
                                @if($m->video_url)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-600">
                                        Video
                                    </span>
                                @endif
                            </div>

                            <h3 class="font-semibold text-slate-800 mb-2 leading-snug">{{ $m->judul }}</h3>

                            @if($m->keterangan)
                                <p class="text-sm text-slate-500 leading-relaxed mb-4 flex-1">
                                    {{ Str::limit($m->keterangan, 100) }}
                                </p>
                            @endif

                            <div class="flex flex-col gap-2 mt-auto">
                                @if($m->pdf_link)
                                    <a href="{{ $m->pdf_link }}" target="_blank"
                                       class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                        Buka Modul PDF
                                    </a>
                                @else
                                    <span class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-slate-100 text-slate-400 text-sm font-medium rounded-lg cursor-not-allowed">
                                        PDF belum tersedia
                                    </span>
                                @endif

                                @if($m->embedUrl())
                                    <button type="button"
                                            @click="videoOpen = true; videoSrc = '{{ $m->embedUrl() }}'; videoTitle = '{{ addslashes($m->judul) }}'"
                                            class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                        Tonton Video
                                    </button>
                                @endif
                            </div>

                        </div>
                    @empty
                        <div class="col-span-3 bg-white rounded-xl border border-slate-200 p-16 text-center">
                            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <p class="text-slate-500 font-medium">Belum ada modul tersedia</p>
                            <p class="text-sm text-slate-400 mt-1">Tunggu guru menambahkan materi</p>
                        </div>
                    @endforelse
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
