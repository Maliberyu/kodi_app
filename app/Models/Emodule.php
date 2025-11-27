<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EModule extends Model
{
    protected $table = 'e_modules';

    protected $fillable = [
        'judul',
        'klasifikasi',
        'keterangan',
        'pdf_link'
    ];
}
