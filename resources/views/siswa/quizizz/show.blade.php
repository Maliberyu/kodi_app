<x-app-layout>

    <div class="w-full h-[calc(100vh-80px)] bg-gray-100 flex flex-col">

        <!-- Header -->
        <div class="p-4 bg-white shadow flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-700">
                Kuis Quizizz: {{ $kode->judul ?? 'Belum Ada Kuis' }}
            </h1>

            <a href="{{ route('siswa.quizizz.index') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Kembali
            </a>
        </div>

        <!-- Konten Quiz -->
        @if ($kode)
            <div class="flex-1">
                <iframe 
                    src="{{ Str::replace('wayground.com', 'quizizz.com', $kode->emblem) }}?hideControls=true&referrer=kodiapp"
                    class="w-full h-full border-0" 
                    allowfullscreen 
                    allow="fullscreen; autoplay; encrypted-media; camera; microphone"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        @else
            <div class="flex items-center justify-center h-full text-gray-500 text-xl">
                Belum ada kode Quizizz yang dibuat guru.
            </div>
        @endif

    </div>

</x-app-layout>