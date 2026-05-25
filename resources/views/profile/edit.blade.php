<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Profil Saya</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Info Profil & Avatar --}}
            <div class="bg-white rounded-xl border border-slate-200 p-8">
                <h3 class="text-sm font-semibold text-slate-800 mb-6">Informasi Profil</h3>

                @if(session('status') === 'profile-updated')
                    <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
                        Profil berhasil diperbarui.
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}"
                      enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('post')

                    {{-- Avatar --}}
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 rounded-full overflow-hidden bg-indigo-100 flex-shrink-0 flex items-center justify-center">
                            @if($user->avatarUrl())
                                <img src="{{ $user->avatarUrl() }}" alt="Avatar"
                                     class="w-full h-full object-cover">
                            @else
                                <span class="text-xl font-bold text-indigo-700">{{ $user->initials() }}</span>
                            @endif
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Foto Profil</label>
                            <input type="file" name="avatar" accept="image/jpg,image/jpeg,image/png,image/webp"
                                   class="block w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors cursor-pointer">
                            <p class="text-xs text-slate-400 mt-1">JPG, PNG, WebP — maks. 2 MB</p>
                            @error('avatar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Nama --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Username</label>
                            <input type="text" name="name" required
                                   value="{{ old('name', $user->name) }}"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                   value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                            @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" required
                               value="{{ old('email', $user->email) }}"
                               class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Kelas & Sekolah (khusus siswa) --}}
                    @if($user->isSiswa())
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Kelas</label>
                            <input type="text" name="kelas"
                                   value="{{ old('kelas', $user->kelas) }}"
                                   placeholder="Contoh: 5A"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah"
                                   value="{{ old('nama_sekolah', $user->nama_sekolah) }}"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        </div>
                    </div>
                    @endif

                    <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Ganti Password --}}
            <div class="bg-white rounded-xl border border-slate-200 p-8">
                <h3 class="text-sm font-semibold text-slate-800 mb-6">Ganti Password</h3>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Hapus Akun --}}
            <div class="bg-white rounded-xl border border-red-100 p-8">
                <h3 class="text-sm font-semibold text-red-700 mb-6">Hapus Akun</h3>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
