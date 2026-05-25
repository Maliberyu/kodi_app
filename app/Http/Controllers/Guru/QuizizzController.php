<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\QuizizzCode;
use Illuminate\Http\Request;

class QuizizzController extends Controller
{
    // Tampilkan daftar semua kode Quizizz milik guru
    public function index()
    {
        $kodeQuizizz = QuizizzCode::where('guru_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('guru.quizizz.index', compact('kodeQuizizz'));
    }

    // Simpan kode Quizizz baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_quiz' => 'required|string|max:255',
            'judul' => 'nullable|string|max:255',
            'emblem' => 'nullable|string|max:255',
        ]);

        QuizizzCode::create([
            'guru_id' => auth()->id(),
            'kode_quiz' => $request->kode_quiz,
            'judul' => $request->judul,
            'emblem' => $request->emblem,
        ]);

        return back()->with('success', 'Kode Quizizz berhasil disimpan!');
    }

    // Hapus kode Quizizz
    public function destroy($id)
    {
        $kode = QuizizzCode::where('guru_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $kode->delete();

        return back()->with('success', 'Kode Quizizz berhasil dihapus!');
    }
}
