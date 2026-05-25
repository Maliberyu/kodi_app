<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kuis;
use App\Models\Emodule;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index(Request $request)
    {
        $query = Kuis::with('emodule');

        if ($modulId = $request->input('modul_id')) {
            $query->where('modul_id', $modulId);
        }
        if ($search = $request->input('search')) {
            $query->where('pertanyaan', 'like', "%{$search}%");
        }

        $kuis     = $query->latest()->paginate(15)->withQueryString();
        $eModules = Emodule::orderBy('judul')->pluck('judul', 'id');

        return view('guru.kuis.index', compact('kuis', 'eModules'));
    }

    public function create()
    {
        $eModules = Emodule::pluck('judul', 'id');
        return view('guru.kuis.create', compact('eModules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modul_id'      => 'required|exists:e_modules,id',
            'pertanyaan'    => 'required',
            'pilihan_a'     => 'required',
            'pilihan_b'     => 'required',
            'pilihan_c'     => 'required',
            'pilihan_d'     => 'required',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'poin'          => 'required|numeric|min:1',
        ]);

        Kuis::create($request->all());

        return redirect()->route('guru.kuis.index')->with('success', 'Soal berhasil ditambah!');
    }

    public function edit(Kuis $kuis)
    {
        $eModules = Emodule::pluck('judul', 'id');
        return view('guru.kuis.edit', compact('kuis', 'eModules'));
    }

    public function update(Request $request, Kuis $kuis)
    {
        $request->validate([
            'modul_id' => 'required|exists:e_modules,id',
        ]);

        $kuis->update($request->all());

        return redirect()->route('guru.kuis.index')->with('success', 'Soal diperbarui!');
    }

    public function destroy(Kuis $kuis)
    {
        $kuis->delete();
        return back()->with('success', 'Soal dihapus!');
    }

    public function byModul(Emodule $modul)
    {
        $kuis = Kuis::where('modul_id', $modul->id)->latest()->paginate(15);
        $eModules = Emodule::pluck('judul', 'id');
        return view('guru.kuis.index', compact('kuis', 'eModules'));
    }
}
