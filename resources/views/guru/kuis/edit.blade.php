<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-slate-800">Edit Soal Kuis</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-slate-200 p-8">

                <form action="{{ route('guru.kuis.update', $kuis) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">E-Module</label>
                        <select name="modul_id" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                            <option value="">-- Pilih E-Module --</option>
                            @foreach($eModules as $id => $judul)
                                <option value="{{ $id }}" {{ old('modul_id', $kuis->modul_id) == $id ? 'selected' : '' }}>{{ $judul }}</option>
                            @endforeach
                        </select>
                        @error('modul_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Pertanyaan</label>
                        <textarea name="pertanyaan" rows="4" required
                                  class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none resize-none">{{ old('pertanyaan', $kuis->pertanyaan) }}</textarea>
                        @error('pertanyaan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach(['a' => 'Pilihan A', 'b' => 'Pilihan B', 'c' => 'Pilihan C', 'd' => 'Pilihan D'] as $key => $label)
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">{{ $label }}</label>
                            <input type="text" name="pilihan_{{ $key }}" required
                                   value="{{ old('pilihan_' . $key, $kuis->{'pilihan_' . $key}) }}"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        </div>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Jawaban Benar</label>
                            <select name="jawaban_benar" required
                                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                                <option value="">-- Pilih --</option>
                                @foreach(['A','B','C','D'] as $j)
                                    <option value="{{ $j }}" {{ old('jawaban_benar', $kuis->jawaban_benar) == $j ? 'selected' : '' }}>{{ $j }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Poin</label>
                            <input type="number" name="poin" min="1" required
                                   value="{{ old('poin', $kuis->poin) }}"
                                   class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('guru.kuis.index') }}"
                           class="px-5 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
