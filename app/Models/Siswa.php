<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'siswa';

    // Jika kolom timestamp tidak digunakan
    public $timestamps = false;

    // Kolom yang bisa diisi massal
    protected $fillable = ['nama', 'kelas', 'email']; // sesuaikan dengan tabelmu

    /**
     * Siswa → orang tua
     * Relasi many-to-many dengan User
     */
    public function orangTua()
    {
        return $this->belongsToMany(
            User::class,
            'orang_tua_siswa',
            'siswa_id',     // foreign key di tabel pivot untuk model Siswa
            'orang_tua_id'  // foreign key di tabel pivot untuk model User
        );
    }

    /**
     * Ambil semua jawaban kuis siswa
     */
    public function jawabanKuis()
    {
        return $this->hasMany(JawabanKuis::class, 'user_id');
    }
}
