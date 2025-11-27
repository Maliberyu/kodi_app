<x-guest-layout>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-amber-50">

        <!-- Container -->
        <div class="max-w-md mx-auto pt-28 px-4 text-center">

            <!-- Judul -->
            <h1 class="text-4xl font-extrabold text-cyan-600">
                Selamat Datang
            </h1>
            <p class="text-gray-600 mt-2">
                Masuk untuk melanjutkan belajar
            </p>

            <!-- Card -->
            <div class="bg-white shadow-xl rounded-2xl p-8 mt-10">

                <!-- Session -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="text-left">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <!-- Icon -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg> -->
                            </span>
                            <input type="email" id="email" name="email"
                                class="w-full px-10 py-3 rounded-lg border border-gray-300 focus:ring-cyan-400 focus:border-cyan-400"
                                placeholder="nama@kodei.app" required autofocus>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 text-left">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <!-- Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3v1m0 0v4m0-4h-6m-6 0a4 4 0 018 0v4a4 4 0 11-8 0v-4z" />
                                </svg>
                            </span>

                            <input type="password" id="password" name="password"
                                class="w-full px-10 py-3 rounded-lg border border-gray-300 focus:ring-fuchsia-400 focus:border-fuchsia-400"
                                placeholder="Masukkan password" required>

                            <!-- Eye Icon -->
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Login Button -->
                    <button
                        class="w-full mt-6 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg shadow-md transition-all">
                        Masuk
                    </button>

                </form>

                <!-- Register Link -->
                <div class="mt-5 text-sm text-gray-700">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-cyan-600 font-semibold hover:underline">
                        Daftar sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
