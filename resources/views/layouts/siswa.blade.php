<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KODI - {{ $title ?? 'Siswa' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    <!-- Navbar Breeze atas (tetap jalan) -->
    @include('layouts.navigation')

    <div class="flex min-h-screen">
        <!-- SIDEBAR KIRI -->
        <aside class="w-72 bg-gradient-to-b from-purple-800 to-pink-700 text-white shadow-2xl fixed h-full z-10 pt-20">
            <div class="p-6 text-center">
                <img src="https://i.ibb.co/9y7hK8Z/kodi-robot.png" alt="KODI" class="w-28 mx-auto animate-bounce">
                <h1 class="text-4xl font-bold mt-4">KODI</h1>
            </div>

            <nav class="mt-10 space-y-3 px-6">
                <a href="/siswa/dashboard" class="block py-4 px-6 rounded-xl text-lg font-bold transition {{ request()->is('siswa/dashboard') ? 'bg-white/30 shadow-lg' : 'hover:bg-white/10' }}">
                    Dashboard
                </a>
                <a href="/siswa/game" class="block py-4 px-6 rounded-xl text-lg font-bold transition {{ request()->is('siswa/game') ? 'bg-white/30 shadow-lg' : 'hover:bg-white/10' }}">
                    Game
                </a>
                <a href="/siswa/ebook" class="block py-4 px-6 rounded-xl text-lg font-bold transition {{ request()->is('siswa/ebook') ? 'bg-white/30 shadow-lg' : 'hover:bg-white/10' }}">
                    Ebook
                </a>
            </nav>

            <!-- Streak & Koin -->
            <div class="absolute bottom-8 left-6 right-6 space-y-4">
                <div class="bg-white/20 backdrop-blur rounded-2xl p-5 text-center">
                    <p class="text-4xl font-bold">{{ auth()->user()->streak }}</p>
                    <p class="text-sm opacity-90">Streak</p>
                </div>
                <div class="bg-white/20 backdrop-blur rounded-2xl p-5 text-center">
                    <p class="text-4xl font-bold">{{ auth()->user()->koin }}</p>
                    <p class="text-sm opacity-90">Koin</p>
                </div>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="ml-72 flex-1 p-10 bg-gradient-to-br from-purple-50 to-pink-50">
            <div class="bg-white rounded-3xl shadow-2xl p-12 min-h-full">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>