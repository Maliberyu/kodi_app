<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\KodingProyek;
use Illuminate\Http\Request;

class PlaygroundController extends Controller
{
    public function index()
    {
        $savedProjects = KodingProyek::where('siswa_id', auth()->id())
            ->latest()
            ->get(['id', 'judul', 'updated_at']);

        return view('siswa.playground.index', compact('savedProjects'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kode_xml' => 'required|string',
        ]);

        $proyek = KodingProyek::updateOrCreate(
            ['id' => $request->input('id'), 'siswa_id' => auth()->id()],
            ['siswa_id' => auth()->id()] + $validated
        );

        return response()->json(['success' => true, 'id' => $proyek->id, 'judul' => $proyek->judul]);
    }

    public function load($id)
    {
        $proyek = KodingProyek::where('siswa_id', auth()->id())->findOrFail($id);
        return response()->json(['kode_xml' => $proyek->kode_xml, 'judul' => $proyek->judul]);
    }

    public function destroy($id)
    {
        KodingProyek::where('siswa_id', auth()->id())->findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
