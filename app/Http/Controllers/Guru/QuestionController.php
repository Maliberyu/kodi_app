<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizOption;

class QuestionController extends Controller
{
    // LIST PERTANYAAN DI SUATU QUIZ
    public function index($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $questions = $quiz->questions()->with('options')->get();

        return view('guru.quiz.questions.index', compact('quiz', 'questions'));
    }

    // PAGE BUAT PERTANYAAN
    public function create($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        return view('guru.quiz.questions.create', compact('quiz'));
    }

    // SIMPAN PERTANYAAN + OPSI
    public function store(Request $request, $quiz_id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2', 
            'options.*' => 'required|string|max:255',
            'correct_option' => 'required|integer|min:0'
        ]);

        $question = QuizQuestion::create([
            'quiz_id' => $quiz_id,
            'question' => $request->question
        ]);

        foreach ($request->options as $key => $value) {
            QuizOption::create([
                'question_id' => $question->id,
                'option_text' => $value,
                'is_correct' => ($request->correct_option == $key) ? 1 : 0
            ]);
        }

        return redirect()->route('guru.quiz.questions.index', ['quiz_id' => $quiz_id])
            ->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    // TAMPILKAN FORM EDIT PERTANYAAN
    public function edit($quiz_id, $question_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = QuizQuestion::with('options')->findOrFail($question_id);

        return view('guru.quiz.questions.edit', compact('quiz', 'question'));
    }

    // UPDATE PERTANYAAN + OPSI
    public function update(Request $request, $quiz_id, $question_id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255',
            'correct_option' => 'required|integer|min:0'
        ]);

        $question = QuizQuestion::findOrFail($question_id);
        $question->update([
            'question' => $request->question
        ]);

        $question->options()->delete();

        foreach ($request->options as $key => $value) {
            QuizOption::create([
                'question_id' => $question->id,
                'option_text' => $value,
                'is_correct' => ($request->correct_option == $key) ? 1 : 0
            ]);
        }

        return redirect()->route('guru.quiz.questions.index', ['quiz_id' => $quiz_id])
            ->with('success', 'Pertanyaan berhasil diupdate!');
    }

    // HAPUS PERTANYAAN + OPSI
    public function destroy($quiz_id, $question_id)
    {
        $question = QuizQuestion::findOrFail($question_id);
        $question->options()->delete();
        $question->delete();

        return redirect()->route('guru.quiz.questions.index', ['quiz_id' => $quiz_id])
            ->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
