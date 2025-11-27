<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span class="mr-2">Hi, {{ auth()->user()->name }}!</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Background adventure yang lembut -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 shadow-xl">
                <div class="absolute inset-0 bg-white opacity-60"></div>

                <div class="relative px-6 py-16 text-center">
                    <!-- Judul besar -->
                    <h1 class="text-5xl md:text-6xl font-black text-gray-900 tracking-tight mb-4">
                        MULAI BERPETUALANG
                    </h1>
                    <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto">
                        Pilih petualangan belajarmu hari ini dan kumpulkan bintang-bintang kemenangan!
                    </p>

                    <!-- 3 Card Horizontal (mirip persis gambar) -->
                    <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-10 max-w-5xl mx-auto">

                        <!-- E-MODULE -->
                        <a href="/siswa/ebook"
                           class="group relative block rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-blue-500 to-cyan-500"></div>
                            <div class="relative p-12 text-white text-center">
                                <!-- Icon Buku -->
                                <div class="mb-6">
                                    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold tracking-wider">E-MODULE</h3>
                                <p class="mt-3 text-white text-opacity-90">Belajar seru dengan modul interaktif</p>
                            </div>
                            <!-- Efek hover glow -->
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                        </a>

                        <!-- GAMES -->
                        <a href="/siswa/game"
                           class="group relative block rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-500 to-red-600"></div>
                            <div class="relative p-12 text-white text-center">
                                <!-- Icon Gamepad -->
                                <div class="mb-6">
                                    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M11 4a1 1 0 10-2 0v2H7a1 1 0 000 2h2v2a1 1 0 102 0V8h2a1 1 0 100-2h-2V4z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M17 14h-2a1 1 0 01-1-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold tracking-wider">GAMES</h3>
                                <p class="mt-3 text-white text-opacity-90">Mainkan game edukasi & raih skor tertinggi</p>
                            </div>
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                        </a>

                        <!-- STORY BOOK -->
                        <a href="/siswa/storybook"
                           class="group relative block rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500 via-pink-500 to-purple-600"></div>
                            <div class="relative p-12 text-white text-center">
                                <!-- Icon Buku Cerita -->
                                <div class="mb-6">
                                    <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold tracking-wider">STORY BOOK</h3>
                                <p class="mt-3 text-white text-opacity-90">Baca cerita seru & bangun imajinasi</p>
                            </div>
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                        </a>

                    </div>

                    <!-- Bonus: Progress kecil (opsional) -->
                    <div class="mt-20 bg-white bg-opacity-80 backdrop-blur-sm rounded-2xl p-8 max-w-4xl mx-auto shadow-inner">
                        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Progress Hari Ini</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                            <div>
                                <p class="text-4xl font-black text-blue-600">2/5</p>
                                <p class="text-gray-600">E-Module</p>
                            </div>
                            <div>
                                <p class="text-4xl font-black text-orange-600">3/5</p>
                                <p class="text-gray-600">Games</p>
                            </div>
                            <!-- <div>
                                <p class="text-4xl font-black text-purple-600">1/3</p>
                                <p class="text-gray-600">Story Book</p>
                            </div> -->
                        </div>
                        <p class="text-center text-gray-700 mt-6 text-lg font-medium">
                            Terus berpetualang, kamu luar biasa!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>