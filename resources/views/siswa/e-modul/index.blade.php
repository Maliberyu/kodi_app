<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">📚 E-Modul</h2>
    </x-slot>

    <style>
        @keyframes popIn { from{opacity:0;transform:scale(.9) translateY(10px)} to{opacity:1;transform:scale(1) translateY(0)} }
        .card-pop { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275) forwards; opacity:0; }
        .modul-card { transition: transform .25s cubic-bezier(.175,.885,.32,1.275), box-shadow .25s; }
        .modul-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(0,0,0,.15); }
    </style>

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ videoOpen: false, videoSrc: '', videoTitle: '' }">

            {{-- Modal Video --}}
            <div x-show="videoOpen" x-cloak
                 class="fixed inset-0 z-50 flex items-center justify-center p-4"
                 style="background:rgba(0,0,0,.75)"
                 @keydown.escape.window="videoOpen = false; videoSrc = ''">
                <div class="bg-white rounded-3xl shadow-2xl w-full max-w-3xl overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 text-white" style="background:linear-gradient(135deg,#ef4444,#f97316)">
                        <div class="flex items-center gap-2">
                            <span>▶️</span>
                            <h3 class="font-bold text-sm" x-text="videoTitle"></h3>
                        </div>
                        <button @click="videoOpen = false; videoSrc = ''"
                                class="p-1.5 rounded-lg transition" style="background:rgba(255,255,255,.2)">✕</button>
                    </div>
                    <div class="aspect-video w-full">
                        <iframe class="w-full h-full" :src="videoSrc" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            {{-- Search --}}
            <form method="GET" action="{{ route('siswa.modules') }}" class="mb-6 flex flex-wrap gap-3">
                <div class="relative flex-1 min-w-[180px]">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari modul..."
                           class="pl-10 pr-4 py-3 border-2 border-slate-200 rounded-2xl text-sm w-full outline-none transition-colors"
                           style="focus:border-color:#818cf8">
                </div>
                @if($klasifikasiList->isNotEmpty())
                <select name="klasifikasi" class="px-4 py-3 border-2 border-slate-200 rounded-2xl text-sm outline-none bg-white">
                    <option value="">🗂 Semua Topik</option>
                    @foreach($klasifikasiList as $opt)
                        <option value="{{ $opt }}" {{ request('klasifikasi') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
                @endif
                <button type="submit" class="px-6 py-3 text-white text-sm font-bold rounded-2xl transition"
                        style="background:linear-gradient(135deg,#6366f1,#8b5cf6);box-shadow:0 6px 20px -4px rgba(99,102,241,.45)">
                    Cari
                </button>
                @if(request('search') || request('klasifikasi'))
                    <a href="{{ route('siswa.modules') }}" class="px-4 py-3 text-sm rounded-2xl transition" style="background:#f1f5f9;color:#475569">Reset</a>
                @endif
            </form>

            {{-- Grid --}}
            @php
                $topColors = [
                    'Berpikir Kritis' => 'linear-gradient(135deg,#3b82f6,#06b6d4)',
                    'Algoritma'       => 'linear-gradient(135deg,#8b5cf6,#a855f7)',
                    'Komputasional'   => 'linear-gradient(135deg,#10b981,#0d9488)',
                ];
                $btnColors = [
                    'Berpikir Kritis' => 'linear-gradient(135deg,#3b82f6,#06b6d4)',
                    'Algoritma'       => 'linear-gradient(135deg,#8b5cf6,#a855f7)',
                    'Komputasional'   => 'linear-gradient(135deg,#10b981,#0d9488)',
                ];
                $emojis = ['Berpikir Kritis'=>'🧠','Algoritma'=>'⚙️','Komputasional'=>'💡'];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($modules as $i => $m)
                    @php
                        $grad  = $topColors[$m->klasifikasi]  ?? 'linear-gradient(135deg,#64748b,#475569)';
                        $btn   = $btnColors[$m->klasifikasi]  ?? 'linear-gradient(135deg,#64748b,#475569)';
                        $emoji = $emojis[$m->klasifikasi]     ?? '📖';
                    @endphp
                    <div class="modul-card card-pop bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm flex flex-col"
                         style="animation-delay:{{ $i * 0.07 }}s">
                        <div class="p-5 text-white" style="background:{{ $grad }}">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-3xl">{{ $emoji }}</span>
                                @if($m->video_url)
                                    <span class="text-xs font-bold px-2 py-0.5 rounded-full" style="background:rgba(255,255,255,.25)">▶ Video</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-base leading-snug">{{ $m->judul }}</h3>
                            <span class="text-xs px-2 py-0.5 rounded-full inline-block mt-1" style="background:rgba(255,255,255,.2)">
                                {{ $m->klasifikasi }}
                            </span>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            @if($m->keterangan)
                                <p class="text-sm text-slate-500 leading-relaxed flex-1">{{ Str::limit($m->keterangan, 90) }}</p>
                            @endif
                            <div class="flex flex-col gap-2 mt-4">
                                @if($m->pdf_link)
                                    <a href="{{ $m->pdf_link }}" target="_blank"
                                       class="flex items-center justify-center gap-2 w-full px-4 py-2.5 text-white text-sm font-bold rounded-2xl transition"
                                       style="background:{{ $btn }};box-shadow:0 4px 15px -3px rgba(0,0,0,.2)">
                                        📄 Buka Modul PDF
                                    </a>
                                @else
                                    <span class="flex items-center justify-center w-full px-4 py-2.5 text-sm rounded-2xl"
                                          style="background:#f1f5f9;color:#94a3b8">PDF belum tersedia</span>
                                @endif
                                @if($m->embedUrl())
                                    <button type="button"
                                            @click="videoOpen = true; videoSrc = '{{ $m->embedUrl() }}'; videoTitle = '{{ addslashes($m->judul) }}'"
                                            class="flex items-center justify-center gap-2 w-full px-4 py-2.5 text-white text-sm font-bold rounded-2xl transition"
                                            style="background:linear-gradient(135deg,#ef4444,#f97316);box-shadow:0 4px 15px -3px rgba(239,68,68,.35)">
                                        ▶️ Tonton Video
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white rounded-3xl border border-slate-200 p-16 text-center">
                        <div class="text-6xl mb-4">📭</div>
                        <p class="font-bold text-slate-600">Belum ada modul</p>
                        <p class="text-sm text-slate-400 mt-1">Tunggu guru menambahkan materi ya!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
