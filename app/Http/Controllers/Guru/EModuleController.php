<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Emodule;
use Illuminate\Http\Request;

class EModuleController extends Controller
{
    private array $klasifikasiOptions = [
        'Berpikir Kritis',
        'Algoritma',
        'Komputasional',
    ];

    public function index(\Illuminate\Http\Request $request)
    {
        $query = Emodule::query();

        if ($klasifikasi = $request->input('klasifikasi')) {
            $query->where('klasifikasi', $klasifikasi);
        }
        if ($search = $request->input('search')) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $modules          = $query->latest()->get();
        $klasifikasiList  = $this->klasifikasiOptions;

        return view('guru.e-modul.index', compact('modules', 'klasifikasiList'));
    }

    public function create()
    {
        $klasifikasiOptions = $this->klasifikasiOptions;
        return view('guru.e-modul.create', compact('klasifikasiOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'klasifikasi' => 'required|in:' . implode(',', $this->klasifikasiOptions),
            'keterangan'  => 'required|string',
            'pdf_link'    => 'nullable|url',
            'video_url'   => 'nullable|url',
        ]);

        $validated['user_id'] = auth()->id();

        Emodule::create($validated);

        return redirect()
            ->route('guru.e-modul.index')
            ->with('success', 'E-Module berhasil ditambahkan!');
    }

    public function edit(Emodule $emodule)
    {
        $klasifikasiOptions = $this->klasifikasiOptions;
        return view('guru.e-modul.edit', compact('emodule', 'klasifikasiOptions'));
    }

    public function update(Request $request, Emodule $emodule)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'klasifikasi' => 'required|in:' . implode(',', $this->klasifikasiOptions),
            'keterangan'  => 'required|string',
            'pdf_link'    => 'nullable|url',
            'video_url'   => 'nullable|url',
        ]);

        $emodule->update($validated);

        return redirect()
            ->route('guru.e-modul.index')
            ->with('success', 'E-Module berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Emodule::findOrFail($id)->delete();
        return back()->with('success', 'Modul berhasil dihapus');
    }
}
