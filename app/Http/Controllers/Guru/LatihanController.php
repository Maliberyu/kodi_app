<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Latihan;
use App\Models\Kuis;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::where('guru_id', auth()->id())
            ->withCount('kuis')
            ->latest()
            ->paginate(15);

        return view('guru.latihan.index', compact('latihan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'tingkat_kesulitan' => 'required|in:Mudah,Sedang,Sulit',
            'tanggal'           => 'required|date',
            'kuis_ids'          => 'required|array|min:1',
            'kuis_ids.*'        => 'exists:kuis,id',
        ]);

        $latihan = Latihan::create([
            'nama'              => $request->nama,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'tanggal'           => $request->tanggal,
            'guru_id'           => auth()->id(),
        ]);

        $latihan->kuis()->attach($request->kuis_ids);

        return redirect()
            ->route('guru.latihan.index')
            ->with('success', 'Latihan "' . $latihan->nama . '" berhasil dibuat dengan ' . count($request->kuis_ids) . ' soal!');
    }

    public function show(Latihan $latihan)
    {
        $this->authorize_latihan($latihan);

        $latihan->load('kuis.emodule');

        return view('guru.latihan.show', compact('latihan'));
    }

    public function destroy(Latihan $latihan)
    {
        $this->authorize_latihan($latihan);

        $latihan->kuis()->detach();
        $latihan->delete();

        return redirect()
            ->route('guru.latihan.index')
            ->with('success', 'Latihan berhasil dihapus.');
    }

    private function authorize_latihan(Latihan $latihan): void
    {
        if ($latihan->guru_id !== auth()->id()) {
            abort(403);
        }
    }
}
