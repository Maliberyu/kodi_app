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
                        <a href="{{ route('siswa.modules') }}"
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
                   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
