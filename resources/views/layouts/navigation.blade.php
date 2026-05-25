<nav x-data="{ open: false }" class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600 tracking-tight">
                    Kodi<span class="text-slate-800">.app</span>
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center gap-6">

                @auth
                    @if(auth()->user()->role === 'siswa')
                        <a href="{{ route('siswa.home') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors">🏠 Beranda</a>
                        <a href="{{ route('siswa.modules') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors">📚 E-Modul</a>
                        <a href="{{ route('siswa.kuis.index') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-orange-600 hover:bg-orange-50 transition-colors">🎯 Kuis</a>
                        <a href="{{ route('siswa.quizizz.index') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-emerald-600 hover:bg-emerald-50 transition-colors">🎮 Quizizz</a>
                        <a href="{{ route('siswa.proyek.index') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-purple-600 hover:bg-purple-50 transition-colors">🛠️ Proyek</a>
                        <a href="{{ route('siswa.playground.index') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-yellow-600 hover:bg-yellow-50 transition-colors">⚡ Playground</a>
                        <a href="{{ route('siswa.ranking') }}" class="text-sm font-bold px-3 py-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors">🏆 Ranking</a>
                    @elseif(auth()->user()->role === 'guru')
                        <a href="{{ route('guru.home') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Beranda</a>
                        <a href="{{ route('guru.e-modul.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">E-Modul</a>
                        <a href="{{ route('guru.kuis.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Kuis</a>
                        <a href="{{ route('guru.latihan.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Latihan</a>
                        <a href="{{ route('guru.siswa.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Siswa</a>
                        <a href="{{ route('guru.proyek.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Proyek</a>
                        <a href="{{ route('guru.ranking') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Ranking</a>
                    @elseif(auth()->user()->role === 'ortu')
                        <a href="{{ route('ortu.home') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Beranda</a>
                    @elseif(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.home') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Pengguna</a>
                        <a href="{{ route('guru.ranking') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Ranking</a>
                    @endif

                    @if(auth()->user()->isOrtu())
                        @php $unread = auth()->user()->unreadNotifications()->count(); @endphp
                        @if($unread > 0)
                            <a href="{{ route('ortu.home') }}"
                               class="relative inline-flex items-center justify-center w-9 h-9 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                                <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-4 h-4 bg-red-500 text-white text-xs font-bold rounded-full">
                                    {{ $unread > 9 ? '9+' : $unread }}
                                </span>
                            </a>
                        @endif
                    @endif

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-2 py-1.5 hover:bg-slate-100 rounded-lg transition-colors">
                                <div class="w-7 h-7 rounded-full overflow-hidden bg-indigo-100 flex-shrink-0 flex items-center justify-center">
                                    @if(auth()->user()->avatarUrl())
                                        <img src="{{ auth()->user()->avatarUrl() }}" alt="" class="w-full h-full object-cover"
                                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                        <span class="text-xs font-bold text-indigo-700" style="display:none">{{ auth()->user()->initials() }}</span>
                                    @else
                                        <span class="text-xs font-bold text-indigo-700">{{ auth()->user()->initials() }}</span>
                                    @endif
                                </div>
                                <span class="text-sm font-medium text-slate-700 max-w-[100px] truncate hidden sm:block">
                                    {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}
                                </span>
                                <svg class="w-3 h-3 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profil Saya
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Keluar
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Masuk
                    </a>
                @endauth
            </div>

            <!-- Hamburger Mobile -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="p-2 text-slate-600 hover:text-slate-800 transition-colors">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden bg-white border-t border-slate-100" style="display:none;">
        <div class="px-4 py-3 space-y-1">
            @auth
                @if(auth()->user()->role === 'siswa')
                    <a href="{{ route('siswa.home') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Beranda</a>
                    <a href="{{ route('siswa.modules') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">E-Modul</a>
                    <a href="{{ route('siswa.kuis.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Kuis</a>
                    <a href="{{ route('siswa.quizizz.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Quizizz</a>
                    <a href="{{ route('siswa.proyek.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Proyek</a>
                    <a href="{{ route('siswa.playground.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Playground</a>
                    <a href="{{ route('siswa.ranking') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Ranking</a>
                @elseif(auth()->user()->role === 'guru')
                    <a href="{{ route('guru.home') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Beranda</a>
                    <a href="{{ route('guru.e-modul.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">E-Modul</a>
                    <a href="{{ route('guru.kuis.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Kuis</a>
                    <a href="{{ route('guru.latihan.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Latihan</a>
                    <a href="{{ route('guru.siswa.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Siswa</a>
                    <a href="{{ route('guru.proyek.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Proyek</a>
                    <a href="{{ route('guru.ranking') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Ranking</a>
                @elseif(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.home') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Dashboard</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Pengguna</a>
                    <a href="{{ route('guru.ranking') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Ranking</a>
                @endif
                <div class="border-t border-slate-100 pt-2 mt-2">
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg">
                            Keluar
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-sm text-indigo-600 font-medium">Masuk</a>
            @endauth
        </div>
    </div>
</nav>
