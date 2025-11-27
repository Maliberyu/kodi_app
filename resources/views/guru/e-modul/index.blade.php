<!-- resources/views/guru/e-modul/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent">
            📚 Daftar E-Module
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Tombol Tambah -->
           <div class="mb-10 text-right">
                        <a href="{{ route('guru.e-modul.create') }}"
                        class="px-8 py-4 
                                bg-gradient-to-r from-purple-500 via-indigo-500 to-blue-500
                                text-white font-bold rounded-2xl shadow-xl 
                                hover:shadow-2xl transition 
                                hover:-translate-y-1 hover:scale-105
                                motion-safe:animate-bounce">
                            ✨ Tambah Modul Baru
                        </a>
                    </div>


            <!-- Grid Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($modules as $m)
                    <div class="bg-white rounded-3xl shadow-xl p-7 border border-purple-100
                                hover:shadow-purple-300 hover:shadow-2xl transition transform hover:-translate-y-2">

                        <h3 class="text-2xl font-extrabold text-purple-700">{{ $m->judul }}</h3>

                        <span class="inline-block mt-3 px-4 py-1.5 rounded-full text-sm text-white
                                     bg-gradient-to-r from-blue-500 to-indigo-600 shadow-md">
                            {{ $m->klasifikasi }}
                        </span>

                        @if($m->keterangan)
                            <p class="text-gray-600 mt-4 text-sm leading-relaxed">
                                {{ Str::limit($m->keterangan, 120) }}
                            </p>
                        @endif

                        <!-- AREA TOMBOL -->
                        <div class="mt-6 flex gap-3">

                            <!-- 1. BUKA LINK -->
                            <a href="{{ $m->pdf_link }}" target="_blank"
                                class="flex-1 text-center px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600
                                       text-white rounded-xl font-semibold text-sm shadow hover:shadow-lg
                                       hover:scale-105 transition">
                                🔗 Buka
                            </a>

                            <!-- ⭐⭐ 2. EDIT (DITANDAI) ⭐⭐
                            <a href="{{ route('guru.e-modul.create', $m->id) }}"
                                class="px-5 py-2.5 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white
                                       rounded-xl font-semibold text-sm shadow hover:shadow-lg
                                       hover:scale-105 transition">
                                ✏️ Edit
                            </a> -->

                            <!-- 3. HAPUS -->
                            <form action="{{ route('guru.e-modul.destroy', $m->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus modul ini?')"
                                    class="px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-700 text-white rounded-xl
                                           font-semibold text-sm shadow hover:shadow-lg hover:scale-105 transition">
                                    🗑️
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <p class="text-center text-gray-600 text-xl col-span-3 mt-10">
                        🌈 Belum ada modul. Yuk tambah yang pertama!
                    </p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
