<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Daftar Soal Kuis</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('guru.kuis.index') }}" class="mb-4 flex flex-wrap items-center gap-3">
                <div class="relative">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari soal..."
                           class="pl-9 pr-4 py-2.5 border border-slate-300 rounded-lg text-sm w-52 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>
                <select name="modul_id" class="px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                    <option value="">Semua Modul</option>
                    @foreach($eModules as $id => $judul)
                        <option value="{{ $id }}" {{ request('modul_id') == $id ? 'selected' : '' }}>{{ $judul }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Filter
                </button>
                @if(request('search') || request('modul_id'))
                    <a href="{{ route('guru.kuis.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm rounded-lg transition-colors">
                        Reset
                    </a>
                @endif
            </form>

            <!-- Toolbar -->
            <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('guru.home') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                    <a href="{{ route('guru.kuis.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Soal
                    </a>
                    <a href="{{ route('guru.quizizz.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                        Kelola Quizizz
                    </a>
                    <a href="{{ route('guru.latihan.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Latihan Saya
                    </a>
                </div>

                <button type="button" id="tombol-buat" onclick="bukaModal()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors opacity-50 cursor-not-allowed">
                    Buat Latihan (<span id="counter">0</span> dipilih)
                </button>
            </div>

            @if($kuis->count() == 0)
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium mb-2">Belum ada soal kuis</p>
                    <a href="{{ route('guru.kuis.create') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Buat soal pertama</a>
                </div>
            @else

                <form id="latihan-form" action="{{ route('guru.latihan.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($kuis as $item)
                            <div class="bg-white rounded-xl border border-slate-200 p-5 hover:shadow-sm hover:border-indigo-200 transition-all duration-200 relative">

                                <div class="absolute top-4 left-4">
                                    <input type="checkbox" name="kuis_ids[]" value="{{ $item->id }}"
                                           class="w-4 h-4 text-indigo-600 rounded border-slate-300 focus:ring-indigo-500"
                                           onchange="updateCounter()">
                                </div>

                                <div class="pl-7">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                            {{ $item->emodule?->judul ?? 'Umum' }}
                                        </span>
                                        <span class="text-sm font-semibold text-slate-700">{{ $item->poin }} poin</span>
                                    </div>

                                    <p class="text-sm font-medium text-slate-800 mb-3 leading-relaxed">
                                        {{ Str::limit($item->pertanyaan, 100) }}
                                    </p>

                                    <div class="text-xs text-slate-600 space-y-1 mb-4">
                                        <p><span class="font-semibold">A.</span> {{ $item->pilihan_a }}</p>
                                        <p><span class="font-semibold">B.</span> {{ $item->pilihan_b }}</p>
                                        <p><span class="font-semibold">C.</span> {{ $item->pilihan_c }}</p>
                                        <p><span class="font-semibold">D.</span> {{ $item->pilihan_d }}</p>
                                    </div>

                                    <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-emerald-50 text-emerald-700">
                                            Jawaban: {{ $item->jawaban_benar }}
                                        </span>
                                        <div class="flex gap-3">
                                            <a href="{{ route('guru.kuis.edit', $item) }}"
                                               class="inline-flex items-center gap-1 text-xs text-indigo-600 hover:text-indigo-800 font-medium">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <button type="button" onclick="hapusSoal({{ $item->id }})"
                                                    class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 font-medium">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6">{{ $kuis->links() }}</div>
                </form>

            @endif
        </div>
    </div>

    <!-- Modal Buat Latihan -->
    <dialog id="modal-latihan" class="rounded-xl shadow-xl p-8 max-w-lg w-full backdrop:bg-black/40">
        <h3 class="text-lg font-semibold text-slate-800 mb-6">Buat Latihan Baru</h3>
        <form method="dialog" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Latihan</label>
                <input type="text" id="nama" placeholder="Contoh: Latihan UTS Bab 1" required
                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tingkat Kesulitan</label>
                    <select id="tingkat" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        <option value="Mudah">Mudah</option>
                        <option value="Sedang" selected>Sedang</option>
                        <option value="Sulit">Sulit</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal</label>
                    <input type="date" id="tanggal" required class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="document.getElementById('modal-latihan').close()"
                        class="px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    Batal
                </button>
                <button type="button" onclick="simpanLatihan()"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Simpan Latihan
                </button>
            </div>
        </form>
    </dialog>

    <script>
        function updateCounter() {
            const count = document.querySelectorAll('input[name="kuis_ids[]"]:checked').length;
            document.getElementById('counter').textContent = count;
            const btn = document.getElementById('tombol-buat');
            if (count > 0) {
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                btn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        function bukaModal() {
            const count = document.querySelectorAll('input[name="kuis_ids[]"]:checked').length;
            if (count === 0) { alert('Pilih minimal 1 soal dulu!'); return; }
            document.getElementById('modal-latihan').showModal();
        }

        function simpanLatihan() {
            const nama = document.getElementById('nama').value.trim();
            const tanggal = document.getElementById('tanggal').value;
            if (!nama || !tanggal) { alert('Nama latihan dan tanggal wajib diisi!'); return; }
            const form = document.getElementById('latihan-form');
            ['nama', 'tingkat_kesulitan', 'tanggal'].forEach(n => {
                form.querySelectorAll(`input[name="${n}"]`).forEach(el => el.remove());
            });
            const inputs = { nama, tingkat_kesulitan: document.getElementById('tingkat').value, tanggal };
            Object.entries(inputs).forEach(([name, value]) => {
                const input = document.createElement('input');
                input.type = 'hidden'; input.name = name; input.value = value;
                form.appendChild(input);
            });
            form.submit();
        }

        function hapusSoal(id) {
            if (!confirm('Yakin hapus soal ini?')) return;
            fetch(`/guru/kuis/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json', 'Accept': 'application/json' }
            }).then(response => {
                if (response.ok || response.redirected) { location.reload(); }
                else { alert('Gagal menghapus soal'); }
            }).catch(() => alert('Error jaringan'));
        }

        document.addEventListener('DOMContentLoaded', updateCounter);
    </script>
</x-app-layout>
