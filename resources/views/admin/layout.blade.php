<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KODI - {{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gradient-to-br from-purple-600 to-blue-600">
    <div class="min-h-full flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-purple-600">KODI Admin Panel</h1>
                <div class="flex items-center gap-4">
                    <span class="text-gray-700">Halo, {{ auth()->user()->name }} (Admin)</span>
                    <a href="{{ route('dashboard') }}" class="text-purple-600 hover:underline">Kembali ke App</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 max-w-7xl w-full mx-auto p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>