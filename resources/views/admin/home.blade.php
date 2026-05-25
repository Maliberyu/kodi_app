<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Dashboard Admin</h2>
        <p class="text-sm text-slate-500 mt-0.5">Selamat datang, {{ auth()->user()->name }}</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Statistik Utama -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

                <div class="bg-white rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Siswa</p>
                        <div class="w-8 h-8 bg-indigo-50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-slate-800">{{ $totalSiswa }}</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Guru</p>
                        <div class="w-8 h-8 bg-indigo-50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-slate-800">{{ $totalGuru }}</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Koin Beredar</p>
                        <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($totalKoin) }}</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Streak Tertinggi</p>
                        <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-slate-800">{{ $maxStreak }} <span class="text-base font-normal text-slate-400">hari</span></p>
                </div>

            </div>

            <!-- Menu Kelola -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

                <a href="{{ route('admin.users.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Kelola Pengguna</h3>
                    <p class="text-sm text-slate-500 mt-1">Lihat semua siswa, guru, dan orang tua</p>
                </a>

                <a href="{{ route('guru.e-modul.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">E-Modul</h3>
                    <p class="text-sm text-slate-500 mt-1">Pantau konten materi yang tersedia</p>
                </a>

                <a href="{{ route('guru.ranking') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Ranking Siswa</h3>
                    <p class="text-sm text-slate-500 mt-1">Lihat peringkat dan aktivitas siswa</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
