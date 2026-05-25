<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Kelola Kode Quizizz</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-5">
                <a href="{{ route('guru.home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Tabel Kode -->
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Daftar Kode Quizizz</h3>
                </div>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-left">
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Kode Quiz</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Embed URL</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($kodeQuizizz as $index => $item)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-slate-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-slate-800 font-medium">{{ $item->judul ?? '-' }}</td>
                                <td class="px-6 py-4 font-mono text-slate-600">{{ $item->kode_quiz }}</td>
                                <td class="px-6 py-4">
                                    @if($item->emblem)
                                        <a href="{{ $item->emblem }}" target="_blank"
                                           class="text-indigo-600 hover:text-indigo-800 font-medium">Lihat</a>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('guru.quizizz.destroy', $item->id) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus kode ini?')"
                                                class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 font-medium">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-slate-400 text-sm">
                                    Belum ada kode Quizizz yang ditambahkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Form Tambah -->
            <div class="bg-white rounded-xl border border-slate-200 p-6">
                <h3 class="font-semibold text-slate-800 text-sm mb-5">Tambah Kode Quizizz</h3>
                <form method="POST" action="{{ route('guru.quizizz.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Judul (opsional)</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Kode Quizizz</label>
                        <input type="text" name="kode_quiz" required value="{{ old('kode_quiz') }}"
                               placeholder="Contoh: 692ce59ce842bd0b1a59df34"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Embed URL (opsional)</label>
                        <input type="text" name="emblem" value="{{ old('emblem') }}"
                               placeholder="https://wayground.com/embed/quiz/..."
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Simpan Kode
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
