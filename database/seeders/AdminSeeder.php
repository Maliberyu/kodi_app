<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kodi.app'],
            [
                'name' => 'Admin KODI',
                'email' => 'admin@kodi.app',
                'password' => Hash::make('admin'), // password: admin
                'role' => 'admin',                 // kita tambah kolom role nanti
                'is_active' => true,
            ]
        );

        // Tampilin di terminal biar yakin berhasil
        $this->command->info('Admin berhasil dibuat!');
        $this->command->info('Email: admin@kodi.app');
        $this->command->info('Password: admin');
    }
}