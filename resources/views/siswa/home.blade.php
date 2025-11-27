<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span class="mr-2">Hi, {{ auth()->user()->name }}!</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 shadow-xl p-8 md:p-12">
                <div class="absolute inset-0 bg-white opacity-60"></div>

                <div class="relative text-center">

                    <h1 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-6">
                        MULAI BERPETUALANG
                    </h1>
                    <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto mb-10">
                        Pilih petualangan belajarmu hari ini dan kumpulkan bintang kemenangan!
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-6">
                        <a href="/siswa/ebook"
                            class="px-8 py-4 bg-blue-500 hover:bg-blue-600 text-white font-bold text-lg rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 w-full sm:w-auto text-center">
                            E-MODULE
                        </a>

                        <a href="/siswa/game"
                            class="px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold text-lg rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 w-full sm:w-auto text-center">
                            GAMES
                        </a>
                    </div>

                    <!-- Progress -->
                    <div class="mt-16 bg-white bg-opacity-80 backdrop-blur-sm rounded-2xl p-6 max-w-4xl mx-auto shadow-inner">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Progress Hari Ini</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center max-w-md mx-auto">
                            <div>
                                <p class="text-4xl font-black text-blue-600">2/5</p>
                                <p class="text-gray-600">E-Module</p>
                            </div>
                            <div>
                                <p class="text-4xl font-black text-orange-600">3/5</p>
                                <p class="text-gray-600">Games</p>
                            </div>
                        </div>
                        <p class="text-center text-gray-700 mt-6 text-lg font-medium">
                            Terus berpetualang, kamu luar biasa!
                        </p>
                    </div>

                    <!-- === Daftar E-Module untuk siswa === -->
                    <div class="mt-16 text-left">
                        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">
                            📘 Daftar E-Module
                        </h2>

                        @if($modules->count() == 0)
                            <p class="text-gray-600 text-lg">Belum ada modul tersedia.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach($modules as $m)
                                    <div class="bg-white bg-opacity-80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-purple-100 hover:shadow-2xl transition">
                                        <h3 class="text-xl font-bold text-purple-700">{{ $m->judul }}</h3>

                                        <span class="inline-block px-4 py-1 mt-2 bg-indigo-100 text-indigo-700 rounded-full text-sm">
                                            {{ $m->klasifikasi }}
                                        </span>

                                        @if($m->keterangan)
                                            <p class="text-gray-600 mt-3 text-sm">
                                                {{ Str::limit($m->keterangan, 100) }}
                                            </p>
                                        @endif

                                        <a href="{{ $m->pdf_link }}" 
                                           target="_blank"
                                           class="mt-4 inline-block px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">
                                            Buka Modul
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
