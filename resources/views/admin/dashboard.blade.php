<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span class="mr-2">🎉</span> Admin Dashboard KODI 🚀
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
                        Selamat Datang, Admin! ✨
                    </h1>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">

                        <!-- Total Siswa -->
                        <!-- <div class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-blue-100 hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 animate-fade-in-delay-1">
                            <div class="text-4xl mb-4 text-blue-600 animate-bounce-slow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="48" height="48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.654-.123-1.282-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.654.123-1.282.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Total Siswa</h3>
                            <p class="text-5xl font-black text-blue-600">{{ $totalSiswa }}</p>
                        </div> -->

                        <!-- Total Guru -->
                        <!-- <div class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-emerald-100 hover:shadow-2xl hover:shadow-emerald-500/50 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 animate-fade-in-delay-2">
                            <div class="text-4xl mb-4 text-emerald-600 animate-bounce-slow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="48" height="48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Total Guru</h3>
                            <p class="text-5xl font-black text-emerald-600">{{ $totalGuru }}</p>
                        </div> -->

                        <!-- Total Koin -->
                        <!-- <div class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-amber-100 hover:shadow-2xl hover:shadow-amber-500/50 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 animate-fade-in-delay-3">
                            <div class="text-4xl mb-4 text-amber-600 animate-bounce-slow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="48" height="48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Total Koin</h3>
                            <p class="text-5xl font-black text-amber-600">{{ $totalKoin }}</p>
                        </div> -->

                        <!-- Streak Tertinggi -->
                        <!-- <div class="group bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-fuchsia-100 hover:shadow-2xl hover:shadow-fuchsia-500/50 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 animate-fade-in-delay-4">
                            <div class="text-4xl mb-4 text-fuchsia-600 animate-bounce-slow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="48" height="48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.89 13.11l-1.78-1.78M11 16h2m-1-6v8m-7 0h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Streak Tertinggi</h3>
                            <p class="text-5xl font-black text-fuchsia-600">{{ $maxStreak }}</p>
                            <p class="text-sm text-gray-500">hari berturut-turut</p>
                        </div>

                    </div> -->

                    <!-- New Section: Recent Activities -->
                    <!-- <div class="bg-white bg-opacity-80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-gray-100 mb-12 animate-fade-in-delay-5">
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
                    </div> -->

                    <!-- Action Button -->
                    <div class="text-center">
                        <a href="#" onclick="alert('Fitur Kelola User coming soon bro!')"
                            class="inline-block bg-gradient-to-r from-purple-600 via-pink-500 to-rose-600 text-white font-extrabold text-2xl py-5 px-12 rounded-full shadow-2xl hover:shadow-lg hover:shadow-purple-500/40 transform hover:scale-105 transition-all duration-300 animate-pulse-slow cursor-pointer relative overflow-hidden">
                            <span class="relative z-10">🛠️ Kelola User (Coming Soon)</span>
                            <div class="absolute inset-0 bg-white opacity-0 hover:opacity-20 transition-opacity duration-300 rounded-full"></div>
                        </a>
                    </div>

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
