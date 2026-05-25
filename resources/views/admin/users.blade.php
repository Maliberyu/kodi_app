<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Kelola Pengguna</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-5">
                <a href="{{ route('admin.home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-semibold text-slate-800 text-sm">Daftar Pengguna</h3>
                    <span class="text-xs text-slate-400">{{ $users->count() }} pengguna</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Streak</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">Koin</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($users as $user)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center text-xs font-semibold flex-shrink-0">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <p class="font-medium text-slate-800">{{ $user->nama_lengkap ?? $user->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $roleColor = match($user->role) {
                                                'guru'  => 'bg-blue-50 text-blue-700',
                                                'siswa' => 'bg-emerald-50 text-emerald-700',
                                                'ortu'  => 'bg-purple-50 text-purple-700',
                                                default => 'bg-slate-100 text-slate-600',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleColor }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-slate-600">{{ $user->kelas ?? '-' }}</td>
                                    <td class="px-6 py-4 text-center font-semibold text-slate-700">{{ $user->streak }}</td>
                                    <td class="px-6 py-4 text-center font-semibold text-amber-600">{{ number_format($user->koin) }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <form method="POST" action="{{ route('admin.users.giveCoins', $user->id) }}" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-white border border-slate-200 hover:bg-amber-50 hover:border-amber-200 text-slate-600 hover:text-amber-700 text-xs font-medium rounded-lg transition-colors">
                                                    +100 Koin
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.users.resetStreak', $user->id) }}" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Reset streak {{ $user->name }}?')"
                                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-white border border-slate-200 hover:bg-red-50 hover:border-red-200 text-slate-500 hover:text-red-600 text-xs font-medium rounded-lg transition-colors">
                                                    Reset Streak
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
