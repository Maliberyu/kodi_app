<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\QuizizzCode;

class QuizizzController extends Controller
{
    public function index()
    {
        // Ambil SEMUA quizizz (terbaru di atas)
        $daftarQuiz = QuizizzCode::orderBy('created_at', 'desc')->get();

        return view('siswa.quizizz.index', compact('daftarQuiz'));
    }

    public function show($id)
    {
        // Ambil quizizz berdasarkan ID
        $quiz = QuizizzCode::findOrFail($id);

        return view('siswa.quizizz.show', compact('quiz'));
    }
}
