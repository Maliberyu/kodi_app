<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-transparent bg-clip-text">
            ➕ Buat Quiz Baru
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow-2xl border">

            <form action="{{ route('guru.quiz.store') }}" method="POST">
                @csrf

                <label class="block mb-2 font-bold text-gray-700">Judul Quiz</label>
                <input type="text" name="title"
                       class="w-full border rounded-lg px-4 py-3 mb-4 focus:ring-2 focus:ring-purple-500"
                       placeholder="Contoh: Quiz Matematika Kelas 4">

                <label class="block mb-2 font-bold text-gray-700">Deskripsi</label>
                <textarea name="description"
                          class="w-full border rounded-lg px-4 py-3 mb-4 focus:ring-2 focus:ring-purple-500"
                          placeholder="Tulis deskripsi quiz..."></textarea>

                <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
                    ✔ Simpan Quiz
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
