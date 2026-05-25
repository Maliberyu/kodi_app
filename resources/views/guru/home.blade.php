<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Dashboard Guru</h2>
        <p class="text-sm text-slate-500 mt-0.5">Selamat datang, {{ auth()->user()->name }}</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Menu Utama -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

                <a href="{{ route('guru.e-modul.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">E-Modul</h3>
                    <p class="text-sm text-slate-500 mt-1">Kelola materi pelajaran</p>
                </a>

                <a href="{{ route('guru.kuis.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Kuis & Latihan</h3>
                    <p class="text-sm text-slate-500 mt-1">Tambah dan kelola soal</p>
                </a>

                <a href="{{ route('guru.siswa.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Data Siswa</h3>
                    <p class="text-sm text-slate-500 mt-1">Lihat informasi siswa</p>
                </a>

                <a href="{{ route('guru.ranking') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Ranking</h3>
                    <p class="text-sm text-slate-500 mt-1">Lihat peringkat siswa</p>
                </a>

            </div>

            <!-- Aktivitas Terbaru -->
            <div class="bg-white rounded-xl border border-slate-200 p-6">
                <h3 class="font-semibold text-slate-800 mb-4">Aktivitas Terbaru</h3>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 py-3 border-b border-slate-100 last:border-0">
                        <div class="w-8 h-8 bg-indigo-50 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-700">Materi baru tersedia untuk siswa</p>
                            <p class="text-xs text-slate-400 mt-0.5">5 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 py-3 border-b border-slate-100 last:border-0">
                        <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-700">Soal kuis berhasil ditambahkan</p>
                            <p class="text-xs text-slate-400 mt-0.5">1 hari yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
