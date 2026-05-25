<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizizzCode extends Model
{
    protected $table = 'quizizz_codes';

    protected $fillable = [
        'guru_id',
        'kode_quiz',
        'judul',
        'emblem',
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
