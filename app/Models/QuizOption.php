<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    protected $table = 'quiz_options';

    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
    ];

    // Relasi ke pertanyaan
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }
}
