<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-transparent bg-clip-text">
            🎮 Daftar Quiz
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto">

            <!-- Tombol Buat Quiz Baru -->
            <a href="{{ route('guru.quiz.create') }}"
               class="px-6 py-3 mb-6 inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
                ➕ Buat Quiz Baru
            </a>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($quizzes as $q)
                <div class="p-6 rounded-2xl shadow-xl bg-white border hover:shadow-2xl transition transform hover:-translate-y-1">
                    <!-- Judul & Deskripsi Quiz -->
                    <h3 class="text-xl font-bold text-purple-700">{{ $q->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ $q->description ?? 'Tidak ada deskripsi' }}</p>

                    <!-- Tombol Lihat Pertanyaan -->
                    <a href="{{ route('guru.quiz.questions.index', $q->id) }}"
                       class="mt-4 inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                        📘 Lihat Pertanyaan
                    </a>

                    <!-- Tombol Edit & Hapus -->
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('guru.quiz.edit', $q->id) }}"
                           class="px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('guru.quiz.destroy', $q->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus quiz ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
