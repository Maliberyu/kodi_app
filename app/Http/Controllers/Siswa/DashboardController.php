<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Emodule;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('siswa.home', compact('user'));
    }

    public function modules(\Illuminate\Http\Request $request)
    {
        $query = Emodule::query();

        if ($klasifikasi = $request->input('klasifikasi')) {
            $query->where('klasifikasi', $klasifikasi);
        }
        if ($search = $request->input('search')) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $modules         = $query->latest()->get();
        $klasifikasiList = Emodule::distinct()->pluck('klasifikasi')->filter()->sort()->values();

        return view('siswa.e-modul.index', compact('modules', 'klasifikasiList'));
    }

    public function ranking()
    {
        $ranking = User::where('role', 'siswa')
            ->withSum('jawabanKuis', 'poin_didapat')
            ->orderByDesc('jawaban_kuis_sum_poin_didapat')
            ->get()
            ->map(function ($user, $index) {
                $user->posisi = $index + 1;
                $user->total_poin = $user->jawaban_kuis_sum_poin_didapat ?? 0;
                return $user;
            });

        $saya       = $ranking->firstWhere('id', Auth::id());
        $posinSaya  = $saya?->posisi ?? '-';
        $poinSaya   = $saya?->total_poin ?? 0;

        return view('siswa.ranking.index', compact('ranking', 'posinSaya', 'poinSaya'));
    }
}
