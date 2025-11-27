<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span class="mr-2">🎉</span> Guru KODI 🚀
        </h2>
    </x-slot>

    <div class="py-12 relative">
        <!-- Background Pattern for Extra Visual Appeal -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-50 opacity-30">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(99,102,241,0.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 overflow-hidden rounded-3xl shadow-2xl border border-purple-100 backdrop-blur-sm">

                <div class="p-10">

                    <h1 class="text-5xl font-extrabold text-center bg-clip-text text-transparent bg-gradient-to-r from-purple-600 via-pink-500 to-rose-600 mb-12 animate-fade-in">
                        Selamat Datang ! ✨
                    </h1>

                    <!-- Stats Cards -->
                    <!-- Menu Kotak -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16 animate-fade-in-delay-5">

                        <!-- Input E-Module -->
                        <a href="{{ route('guru.e-modul.index') }}" 
                            class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-indigo-100 
                                hover:shadow-2xl hover:shadow-indigo-500/50 transition-all duration-500 transform 
                                hover:-translate-y-2 hover:scale-105">
                            <div class="text-4xl mb-4 text-indigo-600 group-hover:rotate-6 transition-transform duration-300">
                                📚
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Daftar E-Module</h3>
                            <p class="text-gray-500 mt-2">Tambahkan modul pelajaran baru</p>
                        </a>
                     <!-- Kelola Koin -->
                        <a href="#" 
                            class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-amber-100 
                                hover:shadow-2xl hover:shadow-amber-500/50 transition-all duration-500 transform 
                                hover:-translate-y-2 hover:scale-105">
                            <div class="text-4xl mb-4 text-amber-600 group-hover:rotate-6 transition-transform duration-300">
                                🎮
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Tambah Soal Game</h3>
                            <p class="text-gray-500 mt-2">Kelola atau tambahkan soal untuk game edukasi.</p>
                        </a>
                        <!-- Data Siswa -->
                        <a href="{{ route('guru.siswa.index') }}" 
                            class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-blue-100 
                                hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 transform 
                                hover:-translate-y-2 hover:scale-105">
                            <div class="text-4xl mb-4 text-blue-600 group-hover:rotate-6 transition-transform duration-300">
                                🧑‍🎓
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Data Siswa</h3>
                            <p class="text-gray-500 mt-2">Kelola informasi siswa</p>
                        </a>

                        <!-- Data Guru -->
                        <!-- <a href="#" 
                            class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-green-100 
                                hover:shadow-2xl hover:shadow-green-500/50 transition-all duration-500 transform 
                                hover:-translate-y-2 hover:scale-105">
                            <div class="text-4xl mb-4 text-green-600 group-hover:rotate-6 transition-transform duration-300">
                                👨‍🏫
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Data Guru</h3>
                            <p class="text-gray-500 mt-2">Kelola informasi guru</p>
                        </a> -->

                       
                  <!-- <a href="#" 
                        class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-rose-100 
                        hover:shadow-2xl hover:shadow-rose-500/50 transition-all duration-500 transform 
                        hover:-translate-y-2 hover:scale-105">
                        
                        <div class="text-4xl mb-4 text-rose-600 group-hover:rotate-6 transition-transform duration-300">
                            🎮
                        </div>

                        <h3 class="text-2xl font-bold text-gray-700">Tambah Soal Game</h3>
                        
                        <p class="text-gray-500 mt-2">Kelola atau tambahkan soal untuk game edukasi.</p>
                    </a> -->


                        <!-- Riwayat -->
                        <!-- <a href="#" 
                            class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-purple-100 
                                hover:shadow-2xl hover:shadow-purple-500/50 transition-all duration-500 transform 
                                hover:-translate-y-2 hover:scale-105">
                            <div class="text-4xl mb-4 text-purple-600 group-hover:rotate-6 transition-transform duration-300">
                                📜
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700">Riwayat</h3>
                            <p class="text-gray-500 mt-2">Lihat aktivitas lengkap</p>
                        </a> -->

                    <!-- Tambah Menu Lain -->
               

                    <!-- New Section: Recent Activities -->
                    <div class="bg-white bg-opacity-80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-gray-100 mb-12 animate-fade-in-delay-5">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">📋 Aktivitas Terbaru</h2>
                        <ul class="space-y-4">
                            <li class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl shadow-sm">
                                <span class="text-2xl mr-4">👤</span>
                                <div>
                                    <p class="font-semibold text-gray-700">Siswa baru bergabung: Ahmad</p>
                                    <p class="text-sm text-gray-500">2 jam yang lalu</p>
                                </div>
                            </li>
                            <li class="flex items-center p-4 bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl shadow-sm">
                                <span class="text-2xl mr-4">🎓</span>
                                <div>
                                    <p class="font-semibold text-gray-700">Guru menambahkan materi baru</p>
                                    <p class="text-sm text-gray-500">5 jam yang lalu</p>
                                </div>
                            </li>
                            <li class="flex items-center p-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl shadow-sm">
                                <span class="text-2xl mr-4">💰</span>
                                <div>
                                    <p class="font-semibold text-gray-700">Koin didistribusikan ke 10 siswa</p>
                                    <p class="text-sm text-gray-500">1 hari yang lalu</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Action Button -->
                    <!-- <div class="text-center">
                        <a href="#" onclick="alert('Fitur Kelola User coming soon bro!')"
                            class="inline-block bg-gradient-to-r from-purple-600 via-pink-500 to-rose-600 text-white font-extrabold text-2xl py-5 px-12 rounded-full shadow-2xl hover:shadow-lg hover:shadow-purple-500/40 transform hover:scale-105 transition-all duration-300 animate-pulse-slow cursor-pointer relative overflow-hidden">
                            <span class="relative z-10">🛠️ Kelola User (Coming Soon)</span>
                            <div class="absolute inset-0 bg-white opacity-0 hover:opacity-20 transition-opacity duration-300 rounded-full"></div>
                        </a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.9; }
        }
        .animate-pulse-slow {
            animation: pulse-slow 2s infinite;
        }
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }
        .animate-fade-in-delay-1 { animation: fade-in 1s ease-out 0.2s both; }
        .animate-fade-in-delay-2 { animation: fade-in 1s ease-out 0.4s both; }
        .animate-fade-in-delay-3 { animation: fade-in 1s ease-out 0.6s both; }
        .animate-fade-in-delay-4 { animation: fade-in 1s ease-out 0.8s both; }
        .animate-fade-in-delay-5 { animation: fade-in 1s ease-out 1s both; }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }
    </style>
</x-app-layout>
