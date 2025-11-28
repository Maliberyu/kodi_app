<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;

class QuizController extends Controller
{
    // LIST QUIZ GURU
    public function index()
    {
        $quizzes = Quiz::where('guru_id', Auth::id())->get();
        return view('guru.quiz.index', compact('quizzes'));
    }

    // PAGE BUAT QUIZ
    public function create()
    {
        return view('guru.quiz.create');
    }

    // SIMPAN QUIZ
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Quiz::create([
            'guru_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('guru.quiz.index')
            ->with('success', 'Quiz berhasil dibuat!');
    }

    // PAGE EDIT QUIZ
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('guru.quiz.edit', compact('quiz'));
    }

    // UPDATE QUIZ
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('guru.quiz.index')
            ->with('success', 'Quiz berhasil diperbarui!');
    }

    // HAPUS QUIZ
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('guru.quiz.index')
            ->with('success', 'Quiz berhasil dihapus!');
    }
}
