<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EModule;

class DashboardController extends Controller
{
    // HALAMAN HOME SISWA
    public function index()
    {
        $user = Auth::user();
        return view('siswa.home', compact('user'));
    }

    // HALAMAN DAFTAR E-MODULE
    public function modules()
    {
        $modules = EModule::orderBy('created_at', 'desc')->get();
        return view('siswa.e-modul.index', compact('modules'));
    }
}
