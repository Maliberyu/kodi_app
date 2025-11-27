<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // INI YANG PENTING — CEK ADMIN DI CONSTRUCTOR (biar aman & gak error role lagi)
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role === 'admin') {
                return $next($request);
            }
            abort(403, 'Hanya Admin yang boleh masuk ke sini!');
        });
    }

    // Daftar user (siswa, guru, ortu)
    public function index()
    {
        $users = User::whereIn('role', ['siswa', 'guru', 'ortu'])->get();
        return view('admin.users', compact('users'));
    }

    // Kasih 100 koin
    public function giveCoins($id)
    {
        $user = User::findOrFail($id);
        $user->koin += 100;
        $user->save();

        return back()->with('success', 'Berhasil kasih 100 koin ke ' . $user->name . '!');
    }

    // Reset streak jadi 0
    public function resetStreak($id)
    {
        $user = User::findOrFail($id);
        $user->streak = 0;
        $user->save();

        return back()->with('success', 'Streak ' . $user->name . ' berhasil di-reset!');
    }
}