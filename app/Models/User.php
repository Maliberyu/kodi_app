<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nama_lengkap',
        'email',
        'password',
        'role',
        'kelas',
        'avatar',
        'nama_sekolah',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // =========================
    // RELASI ORANG TUA -> SISWA
    // =========================
    public function anak()
    {
        return $this->belongsToMany(
            User::class,
            'orang_tua_siswa',
            'orang_tua_id',
            'siswa_id'
        )->where('role', 'siswa');
    }

    // =========================
    // RELASI SISWA -> ORANG TUA
    // =========================
    public function orangTua()
    {
        return $this->belongsToMany(
            User::class,
            'orang_tua_siswa',
            'siswa_id',
            'orang_tua_id'
        )->where('role', 'ortu'); // BENAR: 'ortu' bukan 'orang_tua'
    }

    // =========================
    // SISWA -> JAWABAN KUIS
    // =========================
    public function jawabanKuis()
    {
        return $this->hasMany(JawabanKuis::class, 'user_id');
    }

    // =========================
    // ROLE HELPERS
    // =========================
    public function isAdmin(): bool    { return $this->role === 'admin'; }
    public function isGuru(): bool     { return $this->role === 'guru'; }
    public function isSiswa(): bool    { return $this->role === 'siswa'; }
    public function isOrtu(): bool     { return $this->role === 'ortu'; }

    // =========================
    // AVATAR HELPER
    // =========================
    public function avatarUrl(): string
    {
        if ($this->avatar && file_exists(storage_path('app/public/avatars/' . $this->avatar))) {
            return asset('storage/avatars/' . $this->avatar);
        }
        return '';
    }

    public function initials(): string
    {
        $parts = explode(' ', trim($this->nama_lengkap ?? $this->name));
        $init  = strtoupper(substr($parts[0], 0, 1));
        if (count($parts) > 1) {
            $init .= strtoupper(substr(end($parts), 0, 1));
        }
        return $init;
    }
}
