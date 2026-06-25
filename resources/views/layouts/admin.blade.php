<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin KODI | {{ $title ?? 'Dashboard' }}</title>
    <link rel="manifest" href="{{ url('/manifest.json') }}">
    <meta name="theme-color" content="#7c3aed">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="KODI">
    <link rel="apple-touch-icon" href="{{ asset('icon/icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    @include('layouts.navigation')

    <div class="flex min-h-screen">
        <!-- SIDEBAR KIRI ADMIN -->
        <aside class="w-72 bg-gradient-to-b from-indigo-800 to-purple-900 text-white shadow-2xl fixed h-full z-10 pt-20">
            <div class="p-6 text-center">
                <h1 class="text-4xl font-bold">ADMIN</h1>
                <p class="text-sm opacity-90 mt-2">KODI Control Center</p>
            </div>

            <nav class="mt-10 space-y-2 px-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block py-4 px-6 rounded-xl text-lg font-bold transition {{ request()->is('admin/dashboard') ? 'bg-white/30 shadow-lg' : 'hover:bg-white/10' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" 
                   class="block py-4 px-6 rounded-xl text-lg font-bold transition {{ request()->is('admin/users*') ? 'bg-white/30 shadow-lg' : 'hover:bg-white/10' }}">
                    Kelola User
                </a>
            </nav>

            <div class="absolute bottom-8 left-6 right-6">
                <div class="bg-white/20 backdrop-blur rounded-2xl p-5 text-center">
                    <p class="text-2xl font-bold">{{ auth()->user()->name }}</p>
                    <p class="text-sm opacity-90">Super Admin</p>
                </div>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="ml-72 flex-1 p-10">
            <div class="bg-white rounded-3xl shadow-2xl p-10 min-h-screen">
                @yield('content')
            </div>
        </main>
    </div>

    <x-pwa-install-banner />

    <script>
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
          navigator.serviceWorker.register('{{ asset('sw.js') }}');
        });
      }
    </script>
</body>
</html>