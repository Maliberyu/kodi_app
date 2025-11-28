<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-3">
            Tambah E-Module Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl rounded-3xl border border-purple-100 p-10">

                {{-- PERBAIKAN #1: Ganti route e-modules.store → guru.e-modul.store --}}
                <form action="{{ route('guru.e-modul.store') }}" method="POST">
                    @csrf

                    <!-- Judul -->
                    <div class="mb-8">
                        <label class="block text-gray-700 text-lg font-bold mb-3">
                            Judul Modul
                        </label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="w-full px-5 py-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-lg"
                               placeholder="Contoh: Memecahkan Masalah dengan Pola Berpikir Kritis"
                               required>
                        @error('judul') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Klasifikasi -->
                    <div class="mb-8">
                        <label class="block text-gray-700 text-lg font-bold mb-3">
                            Klasifikasi
                        </label>
                        <select name="klasifikasi"
                                class="w-full px-5 py-4 rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-300 text-lg"
                                required>
                            <option value="">-- Pilih Klasifikasi --</option>
                            <option value="Berpikir Kritis" {{ old('klasifikasi') == 'Berpikir Kritis' ? 'selected' : '' }}>
                                Berpikir Komputasional (BK)
                            </option>
                            <option value="Algoritma" {{ old('klasifikasi') == 'Algoritma' ? 'selected' : '' }}>
                                Algoritma & Pemrograman Dasar
                            </option>
                            <option value="Komputasional" {{ old('klasifikasi') == 'Komputasional' ? 'selected' : '' }}>
                                Kecerdasan Artifisial Dasar
                            </option>
                        </select>
                        @error('klasifikasi') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-8">
                        <label class="block text-gray-700 text-lg font-bold mb-3">
                            Keterangan / Deskripsi
                        </label>
                        <textarea name="keterangan" rows="6"
                                  class="w-full px-5 py-4 rounded-xl border-2 border-gray-200 focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all duration-300 text-lg resize-none"
                                  placeholder="Jelaskan isi modul ini, tujuan pembelajaran, dan manfaat bagi siswa..."
                                  required>{{ old('keterangan') }}</textarea>
                        @error('keterangan') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Link PDF -->
                    <div class="mb-10">
                        <label class="block text-gray-700 text-lg font-bold mb-3">
                            Link PDF (Google Drive / Dropbox / dll)
                        </label>
                        <input type="url" name="pdf_link" value="{{ old('pdf_link') }}"
                               class="w-full px-5 py-4 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300 text-lg font-mono"
                               placeholder="https://drive.google.com/file/d/1AbC123xyz/view?usp=sharing">
                        
                        <div class="mt-3 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                            <p class="text-sm text-blue-800 font-medium flex items-start gap-2">
                                Tips: Pastikan link Google Drive di-set ke <strong>"Anyone with the link"</strong> agar siswa bisa langsung buka tanpa login!
                            </p>
                        </div>
                        @error('pdf_link') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end gap-6 pt-6 border-t border-gray-200">
                        {{-- PERBAIKAN #2: Ganti route e-modules.index → guru.e-modul.index --}}
                        <a href="{{ route('guru.e-modul.index') }}"
                           class="px-8 py-4 bg-gray-500 text-white font-bold rounded-xl hover:bg-gray-600 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-10 py-4 bg-gradient-to-r from-purple-600 via-pink-600 to-rose-600 text-white font-extrabold text-xl rounded-xl hover:shadow-2xl transform hover:scale-110 transition-all duration-300 shadow-xl flex items-center gap-3">
                            Simpan E-Module
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>