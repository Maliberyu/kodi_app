<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\EModuleController;
use App\Http\Controllers\Guru\DashboardController;

// Halaman depan
Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD OTOMATIS REDIRECT SESUAI ROLE
Route::get('/home', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }

    return match (auth()->user()->role) {
        'admin' => redirect()->route('admin.home'),
        'guru' => redirect()->route('guru.home'),
        'siswa' => redirect()->route('siswa.home'),
        default => redirect()->route('home'),
    };
})->middleware('auth')->name('home');

// ==================== ADMIN ROUTES ====================
// HANYA 1 GRUP AJA! Pakai auth + cek manual di controller (paling aman & gak error)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
        // Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        // Route::post('/users/{id}/give-coins', [App\Http\Controllers\Admin\UserController::class, 'giveCoins'])->name('users.giveCoins');
        // Route::post('/users/{id}/reset-streak', [App\Http\Controllers\Admin\UserController::class, 'resetStreak'])->name('users.resetStreak');
    });
});

// ==================== SISWA ROUTES ====================
Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\Siswa\DashboardController::class, 'index'])->name('home');
        // Route::get('/game', fn() => view('siswa.game'))->name('game');
        // Route::get('/ebook', fn() => view('siswa.ebook'))->name('ebook');
    });
});

// ==================== GURU ROUTES ====================
Route::prefix('guru')->name('guru.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\Guru\DashboardController::class, 'index'])->name('home');
        // Route::get('/game', fn() => view('siswa.game'))->name('game');
        // Route::get('/ebook', fn() => view('siswa.ebook'))->name('ebook');
    });
});
// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// e-Module routes for Guru

Route::prefix('guru')->middleware('auth')->name('guru.')->group(function () {
    Route::get('/e-modul', [EModuleController::class, 'index'])->name('e-modul.index');
    Route::get('/e-modul/create', [EModuleController::class, 'create'])->name('e-modul.create');
    Route::post('/e-modul', [EModuleController::class, 'store'])->name('e-modul.store');
    Route::delete('/e-modul/{id}', [EModuleController::class, 'destroy'])->name('e-modul.destroy');
});
// Auth routes
// tampil data siswa


Route::get('/guru/home', [DashboardController::class, 'home'])->name('guru.home');
Route::get('/guru/siswa', [DashboardController::class, 'siswaIndex'])->name('guru.siswa.index');


require __DIR__.'/auth.php';