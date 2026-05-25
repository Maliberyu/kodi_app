<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Proyek Siswa</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filter Status --}}
            <form method="GET" action="{{ route('guru.proyek.index') }}" class="mb-5 flex gap-3">
                <select name="status" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                    <option value="">Semua Status</option>
                    <option value="menunggu" {{ request('status') === 'menunggu' ? 'selected' : '' }}>Menunggu Penilaian</option>
                    <option value="dinilai" {{ request('status') === 'dinilai' ? 'selected' : '' }}>Sudah Dinilai</option>
                </select>
                <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Filter
                </button>
                @if(request('status'))
                    <a href="{{ route('guru.proyek.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 text-slate-600 text-sm rounded-lg hover:bg-slate-50 transition-colors">
                        Reset
                    </a>
                @endif
            </form>

            <div class="space-y-3">
                @forelse($proyeks as $p)
                    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 hover:border-indigo-200 transition-colors">
                        <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0 text-xs font-bold text-indigo-700">
                            {{ $p->siswa->initials() }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-0.5">
                                <p class="text-sm font-semibold text-slate-800 truncate">{{ $p->judul }}</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $p->status === 'dinilai' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                    {{ $p->status === 'dinilai' ? 'Dinilai' : 'Menunggu' }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-500">
                                {{ $p->siswa->nama_lengkap ?? $p->siswa->name }}
                                @if($p->emodule) · {{ $p->emodule->judul }} @endif
                                · {{ $p->created_at->format('d M Y') }}
                            </p>
                        </div>
                        @if($p->status === 'dinilai' && $p->penilaian)
                            <span class="text-sm font-bold text-green-600 flex-shrink-0">{{ $p->penilaian->nilai }}/100</span>
                        @endif
                        <a href="{{ route('guru.proyek.show', $p->id) }}"
                           class="flex-shrink-0 px-3 py-1.5 text-xs font-medium
                                  {{ $p->status === 'menunggu' ? 'bg-indigo-600 hover:bg-indigo-700 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}
                                  rounded-lg transition-colors">
                            {{ $p->status === 'menunggu' ? 'Nilai' : 'Lihat' }}
                        </a>
                    </div>
                @empty
                    <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                        <p class="text-slate-500 font-medium">Belum ada proyek masuk</p>
                        <p class="text-sm text-slate-400 mt-1">Proyek siswa akan muncul di sini</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
