<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 flex items-center">
            📚  Daftar E-Module
        </h2>
    </x-slot>

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0px); }
        }

        @keyframes pop {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-purple-50 to-indigo-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                @foreach($modules as $m)
                    <div 
                        class="relative bg-white rounded-3xl p-6 shadow-xl border-4 border-indigo-200 hover:border-indigo-400 transition-all duration-300 hover:shadow-2xl"
                        style="animation: float 4s ease-in-out infinite;"
                    >
                        <!-- Bubble Dekorasi -->
                        <div class="absolute -top-3 -right-3 w-6 h-6 rounded-full bg-blue-300 animate-ping"></div>
                        <div class="absolute -bottom-3 -left-3 w-5 h-5 rounded-full bg-purple-300 animate-pulse"></div>

                        <h3 class="text-2xl font-extrabold text-indigo-700 drop-shadow">
                            {{ $m->judul }}
                        </h3>

                        <span 
                            class="inline-block px-4 py-1 mt-3 bg-gradient-to-r from-blue-300 to-purple-300 text-indigo-900 rounded-full text-sm font-bold shadow"
                            style="animation: pop 2.5s ease-in-out infinite;"
                        >
                            {{ $m->klasifikasi }}
                        </span>

                        @if($m->keterangan)
                            <p class="text-gray-700 mt-4 text-sm leading-relaxed">
                                {{ Str::limit($m->keterangan, 100) }}
                            </p>
                        @endif

                        <a 
                            href="{{ $m->pdf_link }}"
                            target="_blank"
                            class="mt-6 inline-block px-5 py-3 text-center w-full font-bold text-white rounded-xl text-lg shadow-md bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition-all duration-300 hover:shadow-xl"
                            style="animation: pop 3.5s ease-in-out infinite;"
                        >
                            📖 Buka Modul
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
