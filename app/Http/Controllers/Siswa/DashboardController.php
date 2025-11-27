<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EModule;   // ← WAJIB ditambahkan

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua modul (atau bisa difilter kalau mau)
        $modules = EModule::orderBy('created_at', 'desc')->get();

        return view('siswa.home', compact('user', 'modules'));
    }
}
