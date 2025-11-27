<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🧑‍🎓 Data Siswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-90 rounded-3xl shadow-lg p-8">
                <h1 class="text-3xl font-bold mb-6 text-center">Daftar Siswa</h1>

                <ul class="space-y-4">
                    @forelse($siswa as $s)
                        <li class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl shadow-sm">
                            <span class="text-2xl mr-4">👤</span>
                            <div>
                                <p class="font-semibold text-gray-700">{{ $s->name }}</p>
                                <p class="text-sm text-gray-500">Email: {{ $s->email }}</p>
                            </div>
                        </li>
                    @empty
                        <li class="text-center text-gray-500">Belum ada siswa yang terdaftar.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
