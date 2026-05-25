<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Dashboard</h2>
        <p class="text-sm text-slate-500 mt-0.5">Selamat datang, {{ auth()->user()->name }}</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Total Poin -->
            <div class="bg-indigo-600 rounded-xl p-6 mb-6 text-white">
                <p class="text-sm font-medium text-indigo-200">Total Poin Kamu</p>
                <p class="text-4xl font-bold mt-1">
                    {{ \App\Models\JawabanKuis::where('user_id', auth()->id())->sum('poin_didapat') }}
                </p>
                <p class="text-sm text-indigo-200 mt-1">Terus belajar untuk raih lebih banyak poin!</p>
            </div>

            <!-- Menu Utama -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                <a href="{{ route('siswa.modules') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">E-Modul</h3>
                    <p class="text-sm text-slate-500 mt-1">Baca materi pelajaran</p>
                </a>

                <a href="{{ route('siswa.kuis.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Kuis</h3>
                    <p class="text-sm text-slate-500 mt-1">Kerjakan soal dan kumpulkan poin</p>
                </a>

                <a href="{{ route('siswa.quizizz.index') }}"
                   class="group bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md hover:border-indigo-300 transition-all duration-200">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-100 transition-colors">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800">Quizizz</h3>
                    <p class="text-sm text-slate-500 mt-1">Mainkan kuis interaktif</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
