<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Tambah E-Module Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-slate-200 p-8">

                <form action="{{ route('guru.e-modul.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Judul Modul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                               placeholder="Contoh: Berpikir Komputasional Bab 1"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Klasifikasi</label>
                        <select name="klasifikasi" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                            <option value="">-- Pilih Klasifikasi --</option>
                            <option value="Berpikir Kritis" {{ old('klasifikasi') == 'Berpikir Kritis' ? 'selected' : '' }}>Berpikir Komputasional (BK)</option>
                            <option value="Algoritma" {{ old('klasifikasi') == 'Algoritma' ? 'selected' : '' }}>Algoritma & Pemrograman Dasar</option>
                            <option value="Komputasional" {{ old('klasifikasi') == 'Komputasional' ? 'selected' : '' }}>Kecerdasan Artifisial Dasar</option>
                        </select>
                        @error('klasifikasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan</label>
                        <textarea name="keterangan" rows="4" required
                                  placeholder="Deskripsi singkat tentang isi modul ini..."
                                  class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none resize-none">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Link PDF</label>
                        <input type="url" name="pdf_link" value="{{ old('pdf_link') }}"
                               placeholder="https://drive.google.com/..."
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        <p class="text-xs text-slate-400 mt-1.5">Pastikan link Google Drive diatur ke "Anyone with the link"</p>
                        @error('pdf_link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Link Video YouTube</label>
                        <input type="url" name="video_url" value="{{ old('video_url') }}"
                               placeholder="https://www.youtube.com/watch?v=..."
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        <p class="text-xs text-slate-400 mt-1.5">Opsional — siswa bisa menonton video langsung di halaman modul</p>
                        @error('video_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Simpan Modul
                        </button>
                        <a href="{{ route('guru.e-modul.index') }}"
                           class="px-5 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
