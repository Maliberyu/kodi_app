<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Emodule;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::with(['emodule', 'penilaian'])
            ->where('siswa_id', auth()->id())
            ->latest()
            ->get();

        return view('siswa.proyek.index', compact('proyeks'));
    }

    public function create()
    {
        $emodules = Emodule::orderBy('judul')->get();
        return view('siswa.proyek.create', compact('emodules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'emodule_id'  => 'nullable|exists:e_modules,id',
            'deskripsi'   => 'nullable|string|max:1000',
            'link_proyek' => 'required|url',
        ]);

        $validated['siswa_id'] = auth()->id();
        $validated['status']   = 'menunggu';

        Proyek::create($validated);

        return redirect()->route('siswa.proyek.index')
            ->with('success', 'Proyek berhasil dikumpulkan! Tunggu penilaian dari guru.');
    }

    public function show($id)
    {
        $proyek = Proyek::with(['emodule', 'penilaian.guru'])
            ->where('siswa_id', auth()->id())
            ->findOrFail($id);

        return view('siswa.proyek.show', compact('proyek'));
    }
}
