<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianProyek extends Model
{
    protected $table = 'penilaian_proyek';

    protected $fillable = [
        'proyek_id',
        'guru_id',
        'nilai',
        'komentar',
        'poin_bonus',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
