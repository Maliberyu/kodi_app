<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\EModuleController;
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Siswa\KuisController;
use App\Http\Controllers\Siswa\QuizizzController;
use App\Http\Controllers\Siswa\ProyekController as SiswaProyekController;
use App\Http\Controllers\Siswa\PlaygroundController;
use App\Http\Controllers\Guru\LatihanController;
use App\Http\Controllers\Guru\ProyekController as GuruProyekController;

// Halaman depan
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/bu-Risda', function () {
    return view('profile.bu-Risda');
});

// Redirect otomatis berdasarkan role
Route::get('/home', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }
    return match (auth()->user()->role) {
        'admin' => redirect()->route('admin.home'),
        'ortu'  => redirect()->route('ortu.home'),
        'guru'  => redirect()->route('guru.home'),
        'siswa' => redirect()->route('siswa.home'),
        default => redirect()->route('home'),
    };
})->middleware('auth')->name('home');

// ==================== ADMIN ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::post('/users/{id}/give-coins', [App\Http\Controllers\Admin\UserController::class, 'giveCoins'])->name('users.giveCoins');
    Route::post('/users/{id}/reset-streak', [App\Http\Controllers\Admin\UserController::class, 'resetStreak'])->name('users.resetStreak');
});

// ==================== SISWA ====================
Route::prefix('siswa')->name('siswa.')->middleware(['auth', 'role:siswa'])->group(function () {

    Route::get('/home', [App\Http\Controllers\Siswa\DashboardController::class, 'index'])->name('home');
    Route::get('/e-modul', [App\Http\Controllers\Siswa\DashboardController::class, 'modules'])->name('modules');
    Route::get('/ranking', [App\Http\Controllers\Siswa\DashboardController::class, 'ranking'])->name('ranking');

    // PENTING: rute statis harus di atas rute dinamis {emodul}
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
    Route::get('/kuis/hasil', [KuisController::class, 'hasil'])->name('kuis.hasil');
    Route::post('/kuis/jawab', [KuisController::class, 'simpanJawaban'])->name('kuis.jawab');
    Route::get('/kuis/{emodul}', [KuisController::class, 'kerjakan'])->name('kuis.kerjakan');

    Route::get('/quizizz', [QuizizzController::class, 'index'])->name('quizizz.index');
    Route::get('/quizizz/{id}', [QuizizzController::class, 'show'])->name('quizizz.show');

    // Proyek Siswa
    Route::get('/proyek', [SiswaProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyek/buat', [SiswaProyekController::class, 'create'])->name('proyek.create');
    Route::post('/proyek', [SiswaProyekController::class, 'store'])->name('proyek.store');
    Route::get('/proyek/{id}', [SiswaProyekController::class, 'show'])->name('proyek.show');

    // Coding Playground
    Route::get('/playground', [PlaygroundController::class, 'index'])->name('playground.index');
    Route::post('/playground/save', [PlaygroundController::class, 'save'])->name('playground.save');
    Route::get('/playground/load/{id}', [PlaygroundController::class, 'load'])->name('playground.load');
    Route::delete('/playground/delete/{id}', [PlaygroundController::class, 'destroy'])->name('playground.delete');
});

// ==================== GURU ====================
Route::prefix('guru')->name('guru.')->middleware(['auth', 'role:guru'])->group(function () {

    // Dashboard
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
    Route::get('/siswa', [DashboardController::class, 'siswaIndex'])->name('siswa.index');
    Route::get('/ranking', [DashboardController::class, 'ranking'])->name('ranking');

    // E-Modul (CRUD lengkap)
    Route::get('/e-modul', [EModuleController::class, 'index'])->name('e-modul.index');
    Route::get('/e-modul/create', [EModuleController::class, 'create'])->name('e-modul.create');
    Route::post('/e-modul', [EModuleController::class, 'store'])->name('e-modul.store');
    Route::get('/e-modul/{emodule}/edit', [EModuleController::class, 'edit'])->name('e-modul.edit');
    Route::put('/e-modul/{emodule}', [EModuleController::class, 'update'])->name('e-modul.update');
    Route::delete('/e-modul/{id}', [EModuleController::class, 'destroy'])->name('e-modul.destroy');

    // Kuis
    Route::resource('kuis', App\Http\Controllers\Guru\KuisController::class);
    Route::get('modul/{modul}/kuis', [App\Http\Controllers\Guru\KuisController::class, 'byModul'])->name('kuis.by-modul');

    // Latihan
    Route::resource('latihan', App\Http\Controllers\Guru\LatihanController::class)
         ->only(['index', 'store', 'show', 'destroy']);

    // Quizizz
    Route::get('/quizizz', [\App\Http\Controllers\Guru\QuizizzController::class, 'index'])->name('quizizz.index');
    Route::post('/quizizz', [\App\Http\Controllers\Guru\QuizizzController::class, 'store'])->name('quizizz.store');
    Route::delete('/quizizz/{id}', [\App\Http\Controllers\Guru\QuizizzController::class, 'destroy'])->name('quizizz.destroy');

    // Proyek Siswa
    Route::get('/proyek', [GuruProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyek/{id}', [GuruProyekController::class, 'show'])->name('proyek.show');
    Route::post('/proyek/{id}/nilai', [GuruProyekController::class, 'nilai'])->name('proyek.nilai');
});

// ==================== ORTU ====================
Route::prefix('ortu')->name('ortu.')->middleware(['auth', 'role:ortu'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Ortu\DashboardController::class, 'index'])->name('home');
    Route::get('/anak/{id}', [\App\Http\Controllers\Ortu\DashboardController::class, 'detail'])->name('anak.detail');
    Route::post('/notifications/read', [\App\Http\Controllers\Ortu\DashboardController::class, 'markAllRead'])->name('notifications.read');
});

// ==================== PROFILE ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
