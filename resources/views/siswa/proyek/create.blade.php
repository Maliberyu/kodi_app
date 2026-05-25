<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Kumpulkan Proyek</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-slate-200 p-8">

                <div class="mb-6 p-4 bg-indigo-50 rounded-lg text-sm text-indigo-700">
                    Kumpulkan link proyek coding kamu (Scratch, Tinkercad, Google Drive, dll).
                    Guru akan memberi nilai dan koin bonus!
                </div>

                <form action="{{ route('siswa.proyek.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Judul Proyek</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                               placeholder="Contoh: Lampu Lalu Lintas Koding"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Modul Terkait <span class="text-slate-400">(opsional)</span></label>
                        <select name="emodule_id"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                            <option value="">-- Pilih Modul --</option>
                            @foreach($emodules as $m)
                                <option value="{{ $m->id }}" {{ old('emodule_id') == $m->id ? 'selected' : '' }}>
                                    {{ $m->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('emodule_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi Proyek <span class="text-slate-400">(opsional)</span></label>
                        <textarea name="deskripsi" rows="3"
                                  placeholder="Ceritakan sedikit tentang proyekmu..."
                                  class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none resize-none">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Link Proyek</label>
                        <input type="url" name="link_proyek" value="{{ old('link_proyek') }}" required
                               placeholder="https://scratch.mit.edu/projects/... atau link Google Drive"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        <p class="text-xs text-slate-400 mt-1.5">Bisa link Scratch, Tinkercad, Google Drive, YouTube, dll.</p>
                        @error('link_proyek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Kumpulkan Proyek
                        </button>
                        <a href="{{ route('siswa.proyek.index') }}"
                           class="px-5 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
