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
}
