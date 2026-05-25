<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emodule extends Model
{
    // NAMA TABELNYA PAKAI UNDERSCORE → e_modules
    protected $table = 'e_modules';

    protected $fillable = [
        'judul',
        'klasifikasi',
        'keterangan',
        'pdf_link',
        'video_url',
        'user_id',
    ];

    public function embedUrl(): ?string
    {
        if (!$this->video_url) return null;

        // youtu.be/ID
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $this->video_url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }
        // youtube.com/watch?v=ID
        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $this->video_url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }
        // sudah format embed
        if (str_contains($this->video_url, 'youtube.com/embed/')) {
            return $this->video_url;
        }
        return null;
    }

    // Relasi ke kuis (penting!)
    public function kuis()
    {
        return $this->hasMany(Kuis::class, 'modul_id');
    }

    // Relasi ke user (guru)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}