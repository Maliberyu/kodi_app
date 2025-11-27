<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\EModule;
use Illuminate\Http\Request;

class EModuleController extends Controller
{
    // Daftar klasifikasi yang dipakai di form
    private $klasifikasiOptions = [
        'Berpikir Kritis',
        'Algoritma',
        'Komputasional'
    ];

    // Tampilkan form tambah
    public function create()
    {
        return view('guru.e-modul.create', [
            'klasifikasiOptions' => $this->klasifikasiOptions
        ]);
    }

    // Tampilkan daftar modul (buat nanti)
    public function index()
    {
        $modules = EModule::latest()->get();
        return view('guru.e-modul.index', compact('modules'));
    }

    // Simpan data dari form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'klasifikasi' => 'required|in:' . implode(',', $this->klasifikasiOptions),
            'keterangan'  => 'required|string',
            'pdf_link'    => 'nullable|url|starts_with:https://,http://',
        ]);

        EModule::create($validated);

        return redirect()
            ->route('guru.e-modul.index')
            ->with('success', 'E-Module berhasil ditambahkan!');
    }

    // Hapus modul
    public function destroy($id)
    {
        EModule::findOrFail($id)->delete();
        return back()->with('success', 'Modul berhasil dihapus');
    }
}