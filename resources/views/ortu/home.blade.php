<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Dashboard Orang Tua</h2>
        <p class="text-sm text-slate-500 mt-0.5">
            Halo, {{ Auth::user()->nama_lengkap ?? Auth::user()->name }} &mdash; pantau perkembangan belajar anak
        </p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Notifikasi --}}
            @if($notifications->isNotEmpty())
            <div class="mb-6 bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <h3 class="font-semibold text-slate-800 text-sm">Notifikasi</h3>
                        @php $unread = Auth::user()->unreadNotifications()->count(); @endphp
                        @if($unread > 0)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-600">
                                {{ $unread }} baru
                            </span>
                        @endif
                    </div>
                    @if($unread > 0)
                    <form action="{{ route('ortu.notifications.read') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">
                            Tandai semua dibaca
                        </button>
                    </form>
                    @endif
                </div>
                <div class="divide-y divide-slate-100">
                    @foreach($notifications->take(5) as $notif)
                        @php $data = $notif->data; $isUnread = is_null($notif->read_at); @endphp
                        <div class="px-6 py-3 flex items-start gap-3 {{ $isUnread ? 'bg-indigo-50' : '' }}">
                            <div class="w-8 h-8 bg-{{ $isUnread ? 'indigo' : 'slate' }}-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-{{ $isUnread ? 'indigo' : 'slate' }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-700">
                                    <span class="font-semibold">{{ $data['siswa_name'] }}</span>
                                    menyelesaikan kuis modul
                                    <span class="font-semibold">{{ $data['emodul_name'] }}</span>
                                    &mdash; {{ $data['benar'] }}/{{ $data['total_soal'] }} benar,
                                    <span class="text-indigo-600 font-semibold">+{{ $data['poin'] }} poin</span>
                                </p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $notif->created_at->diffForHumans() }}</p>
                            </div>
                            @if($isUnread)
                                <div class="w-2 h-2 bg-indigo-500 rounded-full flex-shrink-0 mt-2"></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Daftar Anak --}}
            @if($anak->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($anak as $a)
                        @php
                            $poin = $a->total_poin ?? 0;
                            [$status, $statusColor] = $poin >= 80
                                ? ['Sangat Baik', 'emerald']
                                : ($poin >= 50 ? ['Cukup', 'amber'] : ['Perlu Pendampingan', 'red']);
                        @endphp

                        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-sm transition-shadow">
                            <div class="h-1 bg-{{ $statusColor }}-400"></div>
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-sm font-bold text-indigo-700">
                                            {{ strtoupper(substr($a->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-slate-800 text-sm">{{ $a->nama_lengkap ?? $a->name }}</h3>
                                            <p class="text-xs text-slate-400">Kelas {{ $a->kelas ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $statusColor }}-50 text-{{ $statusColor }}-700">
                                        {{ $status }}
                                    </span>
                                </div>

                                <div class="space-y-2.5">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-slate-500">Total Poin</span>
                                        <span class="font-semibold text-slate-800">{{ number_format($poin) }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-slate-500">Streak Belajar</span>
                                        <span class="font-semibold text-slate-800">{{ $a->streak ?? 0 }} hari</span>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <a href="{{ route('ortu.anak.detail', $a->id) }}"
                                       class="inline-flex items-center justify-center w-full gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 p-16 text-center">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <p class="text-slate-600 font-medium mb-1">Belum ada anak terhubung</p>
                    <p class="text-sm text-slate-400 max-w-sm mx-auto">Hubungkan akun anak melalui admin untuk mulai memantau progres belajar.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
