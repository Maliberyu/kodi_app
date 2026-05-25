<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Emodule;
use Illuminate\Notifications\Notification;

class KuisSelesaiNotification extends Notification
{
    public function __construct(
        private User    $siswa,
        private Emodule $emodul,
        private int     $poinDapat,
        private int     $totalBenar,
        private int     $totalSoal
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'siswa_id'    => $this->siswa->id,
            'siswa_name'  => $this->siswa->nama_lengkap ?? $this->siswa->name,
            'emodul_id'   => $this->emodul->id,
            'emodul_name' => $this->emodul->judul,
            'poin'        => $this->poinDapat,
            'benar'       => $this->totalBenar,
            'total_soal'  => $this->totalSoal,
        ];
    }
}
