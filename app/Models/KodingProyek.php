<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodingProyek extends Model
{
    protected $table = 'koding_proyek';

    protected $fillable = [
        'siswa_id',
        'judul',
        'kode_xml',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
