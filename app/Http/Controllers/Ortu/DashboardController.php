<?php

namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\JawabanKuis;

class DashboardController extends Controller
{
    public function index()
    {
        $ortu = Auth::user();

        $anak = $ortu->anak()->withCount([
            'jawabanKuis as total_poin' => fn($q) => $q->select(DB::raw('COALESCE(SUM(poin_didapat),0)')),
        ])->get();

        $notifications = $ortu->notifications()->latest()->take(20)->get();

        return view('ortu.home', compact('anak', 'notifications'));
    }

    public function detail($id)
    {
        $anak = Auth::user()->anak()->findOrFail($id);

        $progress = JawabanKuis::select(
                'kuis.modul_id',
                DB::raw('COUNT(*) as total_soal'),
                DB::raw('SUM(jawaban_kuis.poin_didapat) as poin')
            )
            ->join('kuis', 'kuis.id', '=', 'jawaban_kuis.kuis_id')
            ->where('jawaban_kuis.user_id', $anak->id)
            ->groupBy('kuis.modul_id')
            ->get();

        return view('ortu.detail', compact('anak', 'progress'));
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }
}
