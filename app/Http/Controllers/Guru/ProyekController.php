<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\PenilaianProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyek::with(['siswa', 'emodule', 'penilaian']);

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $proyeks = $query->latest()->get();

        return view('guru.proyek.index', compact('proyeks'));
    }

    public function show($id)
    {
        $proyek = Proyek::with(['siswa', 'emodule', 'penilaian.guru'])->findOrFail($id);
        return view('guru.proyek.show', compact('proyek'));
    }

    public function nilai(Request $request, $id)
    {
        $validated = $request->validate([
            'nilai'      => 'required|integer|min:0|max:100',
            'komentar'   => 'nullable|string|max:500',
            'poin_bonus' => 'required|integer|min:0|max:500',
        ]);

        $proyek = Proyek::with('penilaian')->findOrFail($id);

        // Simpan atau update penilaian
        $penilaian = $proyek->penilaian ?? new PenilaianProyek(['proyek_id' => $proyek->id]);
        $penilaianBaru = !$penilaian->exists;

        $penilaian->fill([
            'guru_id'    => auth()->id(),
            'nilai'      => $validated['nilai'],
            'komentar'   => $validated['komentar'],
            'poin_bonus' => $validated['poin_bonus'],
        ])->save();

        // Tambah koin ke siswa hanya jika penilaian baru (bukan update)
        if ($penilaianBaru && $validated['poin_bonus'] > 0 && $proyek->siswa) {
            $proyek->siswa->increment('koin', $validated['poin_bonus']);
        }

        $proyek->update(['status' => 'dinilai']);

        return redirect()->route('guru.proyek.show', $id)
            ->with('success', '✅ Penilaian berhasil disimpan!');
    }
}
