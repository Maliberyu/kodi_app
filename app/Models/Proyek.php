<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';

    protected $fillable = [
        'siswa_id',
        'emodule_id',
        'judul',
        'deskripsi',
        'link_proyek',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function emodule()
    {
        return $this->belongsTo(Emodule::class, 'emodule_id');
    }

    public function penilaian()
    {
        return $this->hasOne(PenilaianProyek::class, 'proyek_id');
    }
}
