<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-transparent bg-clip-text">
            ✏️ Edit Quiz: {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-2xl border">

            <form action="{{ route('guru.quiz.update', $quiz->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mb-2 font-bold text-gray-700">Judul Quiz</label>
                <input type="text" name="title" value="{{ old('title', $quiz->title) }}"
                       class="w-full border rounded-lg px-4 py-3 mb-4 focus:ring-2 focus:ring-blue-500"
                       placeholder="Judul Quiz">

                <label class="block mb-2 font-bold text-gray-700">Deskripsi</label>
                <textarea name="description"
                          class="w-full border rounded-lg px-4 py-3 mb-4 focus:ring-2 focus:ring-purple-500"
                          placeholder="Deskripsi (opsional)">{{ old('description', $quiz->description) }}</textarea>

                <button class="w-full mt-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
                    ✔ Simpan Perubahan
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
