<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuru  = User::where('role', 'guru')->count();
        $totalKoin  = User::sum('koin');
        $maxStreak  = User::where('role', 'siswa')->max('streak') ?? 0; // INI YANG BENER BRO!!

        return view('admin.home', compact(
            'totalSiswa',
            'totalGuru',
            'totalKoin',
            'maxStreak'
        ));
    }
}   