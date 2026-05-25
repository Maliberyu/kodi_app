<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Emodule;
use App\Models\Kuis;
use App\Models\JawabanKuis;
use App\Notifications\KuisSelesaiNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuisController extends Controller
{
    public function index()
    {
        $emoduls = Emodule::withCount('kuis')
                          ->has('kuis')
                          ->orderBy('judul')
                          ->get();

        return view('siswa.kuis.index', compact('emoduls'));
    }

    public function kerjakan(Emodule $emodul)
    {
        $kuis = $emodul->kuis()->inRandomOrder()->get();

        $sudahDijawab = JawabanKuis::where('user_id', Auth::id())
                                   ->whereIn('kuis_id', $kuis->pluck('id'))
                                   ->pluck('kuis_id')
                                   ->toArray();

        return view('siswa.kuis.kerjakan', compact('emodul', 'kuis', 'sudahDijawab'));
    }

    public function simpanJawaban(Request $request)
    {
        $request->validate([
            'kuis_id'   => 'required|array',
            'kuis_id.*' => 'exists:kuis,id',
            'emodul_id' => 'required|exists:e_modules,id',
        ]);

        $benarCount = 0;
        $totalPoin  = 0;

        foreach ($request->kuis_id as $kuisId) {
            $jawabanKey = 'jawaban_' . $kuisId;

            if (!$request->has($jawabanKey)) continue;

            if (JawabanKuis::where('user_id', Auth::id())->where('kuis_id', $kuisId)->exists()) {
                continue;
            }

            $soal         = Kuis::find($kuisId);
            $jawabanSiswa = $request->input($jawabanKey);
            $poin         = ($jawabanSiswa === $soal->jawaban_benar) ? $soal->poin : 0;

            JawabanKuis::create([
                'user_id'       => Auth::id(),
                'kuis_id'       => $soal->id,
                'emodul_id'     => $request->emodul_id,
                'jawaban_siswa' => $jawabanSiswa,
                'poin_didapat'  => $poin,
            ]);

            if ($poin > 0) {
                $benarCount++;
                $totalPoin += $poin;
            }
        }

        // Kirim notifikasi ke orang tua jika ada poin baru
        if ($totalPoin > 0) {
            $siswa  = Auth::user();
            $emodul = Emodule::find($request->emodul_id);
            $total  = count($request->kuis_id);

            $siswa->orangTua->each(function ($ortu) use ($siswa, $emodul, $totalPoin, $benarCount, $total) {
                $ortu->notify(new KuisSelesaiNotification($siswa, $emodul, $totalPoin, $benarCount, $total));
            });
        }

        $pesan = $totalPoin > 0
            ? "Selamat! Kamu benar {$benarCount} soal dan mendapat {$totalPoin} poin!"
            : "Tidak ada jawaban baru yang tersimpan.";

        return redirect()
            ->route('siswa.kuis.kerjakan', $request->emodul_id)
            ->with('success', $pesan);
    }

    public function hasil()
    {
        $hasil = JawabanKuis::with('kuis.emodule')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        $totalPoin = JawabanKuis::where('user_id', Auth::id())
            ->sum('poin_didapat');

        $analisisModul = JawabanKuis::select(
                'kuis.modul_id',
                'e_modules.judul as judul_modul',
                DB::raw('COUNT(jawaban_kuis.id) as total_soal'),
                DB::raw('SUM(jawaban_kuis.poin_didapat) as poin_didapat')
            )
            ->join('kuis', 'kuis.id', '=', 'jawaban_kuis.kuis_id')
            ->join('e_modules', 'e_modules.id', '=', 'kuis.modul_id')
            ->where('jawaban_kuis.user_id', Auth::id())
            ->groupBy('kuis.modul_id', 'e_modules.judul')
            ->get();

        return view('siswa.kuis.hasil', compact('hasil', 'totalPoin', 'analisisModul'));
    }
}
