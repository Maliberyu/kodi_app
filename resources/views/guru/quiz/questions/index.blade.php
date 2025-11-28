<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 text-transparent bg-clip-text">
            📘 Pertanyaan Quiz: {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto">

        <!-- Tombol Tambah Pertanyaan -->
        <a href="{{ route('guru.quiz.questions.create', $quiz->id) }}"
           class="px-6 py-3 mb-6 inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
            ➕ Tambah Pertanyaan
        </a>

        <!-- Daftar Pertanyaan -->
        @foreach($questions as $q)
        <div class="bg-white p-6 rounded-2xl shadow mb-6 border hover:shadow-xl transition">

            <!-- Pertanyaan -->
            <h3 class="text-lg font-bold text-purple-700">{{ $q->question }}</h3>

            <!-- Opsi Jawaban -->
            <ul class="mt-4 space-y-2">
                @foreach($q->options as $opt)
                    <li class="px-4 py-2 rounded-lg
                        {{ $opt->is_correct ? 'bg-green-100 text-green-700 font-bold' : 'bg-gray-100 text-gray-700' }}">
                        {{ $opt->option_text }}
                    </li>
                @endforeach
            </ul>

            <!-- Tombol Edit & Hapus -->
            <div class="mt-4 flex gap-2">
                <a href="{{ route('guru.quiz.questions.edit', [$quiz->id, $q->id]) }}"
                   class="px-4 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                    ✏️ Edit
                </a>

                <form action="{{ route('guru.quiz.questions.destroy', [$quiz->id, $q->id]) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?');">
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
</x-app-layout>
