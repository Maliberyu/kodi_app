<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';

    protected $fillable = [
        'modul_id',         // ← PAKAI YANG SUDAH ADA DI TABEL
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'jawaban_benar',
        'poin',
    ];

    // Relasi ke Emodule (walaupun kolomnya modul_id)
    public function emodule()
    {
        return $this->belongsTo(Emodule::class, 'modul_id'); // foreign key = modul_id
    }
    
    public function jawabanSiswa()
        {
            return $this->hasMany(JawabanKuis::class, 'kuis_id');
        }
    public function latihans() 
    { 
        return $this->belongsToMany(Latihan::class); 
    }
    public function latihan()
    {
        return $this->belongsToMany(Latihan::class, 
        'kuis_latihan',
        'kuis_id',
        'latihan_id');
    }

}