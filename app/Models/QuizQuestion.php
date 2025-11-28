<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';

    // Hanya kolom yang benar-benar ada di quiz_questions
    protected $fillable = [
        'quiz_id',
        'question',
    ];

    // Relasi ke quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relasi ke opsi pertanyaan
    public function options()
    {
        return $this->hasMany(QuizOption::class, 'question_id');
    }
}
