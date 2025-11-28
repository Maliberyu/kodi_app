<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = [
        'quiz_id',
        'siswa_id',
        'score',
        'correct_count',
        'wrong_count'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
