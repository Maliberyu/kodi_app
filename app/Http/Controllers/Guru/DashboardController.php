<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JawabanKuis;

class DashboardController extends Controller
{
    public function home()
    {
        return view('guru.home');
    }

    public function siswaIndex(Request $request)
    {
        $query = User::where('role', 'siswa');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('kelas', 'like', "%{$search}%");
            });
        }

        $siswa = $query->orderBy('name')->paginate(20)->withQueryString();
        return view('guru.siswa.index', compact('siswa'));
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

        $totalSiswa  = $ranking->count();
        $totalModul  = \App\Models\Emodule::count();
        $totalSoal   = \App\Models\Kuis::count();

        return view('guru.ranking.index', compact('ranking', 'totalSiswa', 'totalModul', 'totalSoal'));
    }
}
