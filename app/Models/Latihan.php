<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    protected $table = 'latihan'; // kalau tabelnya namanya 'latihan'
    
    protected $fillable = [
        'nama',
        'tingkat_kesulitan', 
        'tanggal',
        'guru_id'
    ];

    // INI YANG PENTING: nama tabel pivot-nya kuis_latihan
    public function kuis()
    {
        return $this->belongsToMany(
            Kuis::class,
            'kuis_latihan',     // ← nama tabel pivot kamu
            'latihan_id',       // ← foreign key di tabel pivot yang nunjuk ke latihan
            'kuis_id'           // ← foreign key di tabel pivot yang nunjuk ke kuis
        );
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}