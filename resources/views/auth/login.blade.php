<x-guest-layout>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-amber-50 flex items-center justify-center px-4">

        <!-- Card Login -->
        <div class="w-full max-w-3xl bg-gradient-to-r from-cyan-100 via-blue-100 to-orange-100 shadow-xl rounded-3xl p-10">

            <!-- Judul -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-cyan-700">
                    Selamat Datang
                </h1>
                <p class="text-gray-600 mt-2">
                    Masuk untuk melanjutkan belajar
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required autofocus
                        class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 focus:ring-cyan-400 focus:border-cyan-400"
                        placeholder="nama@kodei.app">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative mt-1">
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-fuchsia-400 focus:border-fuchsia-400"
                            placeholder="Masukkan password">
                        <!-- Eye icon placeholder (bisa dikustom JS nanti) -->
                        <!-- <span class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span> -->
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-xl shadow-md transition-all">
                    Masuk
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-sm text-gray-700 text-center">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-cyan-700 font-semibold hover:underline">
                    Daftar sekarang
                </a>
            </div>
        </div>

    </div>

</x-guest-layout>
