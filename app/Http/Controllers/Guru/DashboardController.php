<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function home()
    {
        return view('guru.home'); // home dashboard
    }

    public function siswaIndex()
{
    // Ambil semua user yang role = 'siswa'
    $siswa = User::where('role', 'siswa')->get();

    return view('guru.siswa.index', compact('siswa'));
}
}
