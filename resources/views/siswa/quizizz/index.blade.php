{{-- resources/views/siswa/quizizz/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text">
            Quizizz Terbaru
        </h2>
    </x-slot>

    <div class="py-12 px-6 max-w-4xl mx-auto">

        @php
            $quizTerbaru = \DB::table('quizizz_codes')
                ->orderBy('created_at', 'desc')
                ->first();
        @endphp

        <!-- TOMBOL KEMBALI (selalu ada di pojok kiri atas) -->
        <div class="mb-6">
            <a href="{{ route('siswa.home') }}"
               class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-800 text-white font-semibold px-5 py-3 rounded-xl shadow-lg transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
        @if ($daftarQuiz->count())
    
                <div class="space-y-10">

                    @foreach ($daftarQuiz as $quiz)
                    <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">

                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-white">
                            <h3 class="text-2xl font-extrabold">
                                {{ $quiz->judul ?? 'Quizizz' }}
                            </h3>
                            <p class="mt-1 text-blue-100">
                                Siap dimainkan
                            </p>
                        </div>

                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <p class="text-sm text-gray-500">Judul Kuis</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ $quiz->judul ?? 'Tanpa Judul' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Kode Quiz</p>
                                    <p class="text-lg font-mono text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg inline-block">
                                        {{ $quiz->kode_quiz }}
                                    </p>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ $quiz->emblem }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold px-8 py-4 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105">
                                    ▶ MAIN SEKARANG
                                </a>

                                <p class="text-xs text-gray-500 mt-3">
                                    Dibuka di tab baru
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            @else
                <div class="text-center py-24">
                    <div class="text-6xl mb-6">⏳</div>
                    <p class="text-xl text-gray-500">Belum ada Quizizz yang dibuat oleh guru.</p>
                </div>
            @endif

        <!-- @if ($quizTerbaru)

            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 text-white">
                    <h3 class="text-3xl font-extrabold">
                        {{ $quizTerbaru->judul ?? 'Quizizz Terbaru' }}
                    </h3>
                    <p class="mt-2 text-blue-100 text-lg">
                        Siap dimainkan sekarang juga!
                    </p>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-500">Judul Kuis</p>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $quizTerbaru->judul ?? 'Tanpa Judul' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kode / ID Quiz</p>
                            <p class="text-xl font-mono text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg inline-block">
                                {{ $quizTerbaru->kode_quiz }}
                            </p>
                        </div>
                    </div>

                     TOMBOL MAIN (buka link emblem dari database) -->
                    <div class="text-center">
                        <!-- <a href="{{ $quizTerbaru->emblem }}" 
                           target="_blank"
                           class="inline-flex items-center gap-4 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold text-xl px-10 py-6 rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-green-500/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            MAIN SEKARANG
                        </a> -->

                        <p class="text-sm text-gray-500 mt-4">
                            Akan terbuka di tab baru • Support Quizizz, Wayground, Kahoot, dll
                        </p>
                    </div>
                </div>
            </div>

        @else
            <div class="text-center py-24">
                <div class="text-6xl mb-6">Menunggu...</div>
                <p class="text-xl text-gray-500">Belum ada Quizizz yang dibuat oleh guru.</p>
                <p class="text-gray-400 mt-4">Tunggu guru mengunggah kuis terbaru ya!</p>
            </div>
        @endif 

    </div>
</x-app-layout>