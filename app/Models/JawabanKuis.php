<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanKuis extends Model
{
    protected $table = 'jawaban_kuis';

    protected $fillable = [
        'user_id',
        'kuis_id',
        'emodul_id',
        'jawaban_siswa',
        'poin_didapat'
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    // NAMA RELASINYA HARUS **emodul**, BUKAN emodule
    public function emodul()
    {
        return $this->belongsTo(Emodule::class, 'emodul_id');
    }
}
