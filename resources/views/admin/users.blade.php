<x-admin.layout title="Kelola Pengguna">
    <div class="bg-white rounded-2xl shadow-xl p-6">
        <h2 class="text-2xl font-bold mb-6">Daftar Pengguna</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Kelas</th>
                        <th class="px-4 py-3">Streak</th>
                        <th class="px-4 py-3">Koin</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $user->nama_lengkap ?? $user->name }}</td>
                        <td class="px-4 py-3"><span class="px-3 py-1 rounded-full text-xs font-bold 
                            {{ $user->role == 'admin' ? 'bg-red-500 text-white' : 
                               ($user->role == 'guru' ? 'bg-blue-500 text-white' : 
                               ($user->role == 'siswa' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white')) }}">
                            {{ ucfirst($user->role) }}
                        </span></td>
                        <td class="px-4 py-3">{{ $user->kelas ?? '-' }}</td>
                        <td class="px-4 py-3 text-center font-bold">{{ $user->streak }}</td>
                        <td class="px-4 py-3 text-center font-bold text-yellow-600">{{ $user->koin }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.users.giveCoins', $user->id) }}" class="inline">
                                @csrf
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">+100 Koin</button>
                            </form>
                            <form method="POST" action="{{ route('admin.users.resetStreak', $user->id) }}" class="inline ml-2">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Reset Streak</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>