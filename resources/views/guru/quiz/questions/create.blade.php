<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 text-transparent bg-clip-text">
            ➕ Tambah Pertanyaan untuk Quiz: {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-2xl border">

            <form action="{{ route('guru.quiz.questions.store', $quiz->id) }}" method="POST">
                @csrf

                <label class="block mb-2 font-bold text-gray-700">Pertanyaan</label>
                <textarea name="question"
                          class="w-full border rounded-lg px-4 py-3 mb-4 focus:ring-2 focus:ring-blue-500"
                          placeholder="Contoh: Berapa hasil 7 × 6?"></textarea>

                <h3 class="font-bold text-lg mb-3 text-purple-700">Pilihan Jawaban</h3>

                @php $letters = ['A','B','C','D']; @endphp

                @foreach($letters as $index => $huruf)
                    <div class="mb-4">
                        <label class="font-bold text-gray-700">Opsi {{ $huruf }}</label>
                        <input type="text" name="options[{{ $huruf }}]"
                               class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500"
                               placeholder="Isi jawaban pilihan {{ $huruf }}">
                    </div>
                @endforeach

                <label class="block mb-2 font-bold text-gray-700 mt-4">Jawaban Benar</label>
                <select name="correct_option"
                        class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                    <option value="">-- pilih jawaban benar --</option>
                    @foreach($letters as $huruf)
                        <option value="{{ $huruf }}">{{ $huruf }}</option>
                    @endforeach
                </select>

                <button class="w-full mt-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
                    ✔ Simpan Pertanyaan
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
