<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-orange-50 py-12 px-4">
        <div class="w-full max-w-md">

            <!-- TITLE -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-blue-700">Daftar Akun</h2>
                <p class="text-gray-600 mt-2">Buat akun untuk mulai belajar</p>
            </div>

            <!-- CARD -->
            <div class="bg-white shadow-lg rounded-xl p-8">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input id="name" name="name" type="text"
                               class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('name') }}" required autofocus>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email"
                               class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mt-4">
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select id="role" name="role"
                                class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" name="password" type="password"
                               class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                               required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                               class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                               required>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- BUTTON -->
                    <div class="mt-6">
                        <button
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition">
                            Daftar
                        </button>
                    </div>

                    <!-- LOGIN LINK -->
                    <p class="text-center text-sm text-gray-600 mt-4">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">
                            Masuk di sini
                        </a>
                    </p>

                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
