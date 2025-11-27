<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class KodiFullSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ADMIN (punya semua akses)
        User::updateOrCreate(
            ['email' => 'admin@kodi.app'],
            [
                'name' => 'Admin KODI',
                'email' => 'admin@kodi.app',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'nama_lengkap' => 'Administrator KODI',
                'koin' => 999999,
                'is_active' => true,
            ]
        );

        // 2. GURU
        User::updateOrCreate(
            ['email' => 'guru@kodi.app'],
            [
                'name' => 'Bu Guru',
                'email' => 'guru@kodi.app',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'nama_lengkap' => 'Siti Aisyah, S.Pd',
                'kelas' => '5A',
                'koin' => 5000,
            ]
        );

        // 3. SISWA CONTOH (Budi)
        User::updateOrCreate(
            ['email' => 'budi@kodi.app'],
            [
                'name' => 'Budi',
                'email' => 'budi@kodi.app',
                'password' => Hash::make('budi123'),
                'role' => 'siswa',
                'nama_lengkap' => 'Budi Santoso',
                'kelas' => '5A',
                'streak' => 12,
                'koin' => 850,
                'avatar' => 'robot-merah.png',
                'tanggal_lahir' => '2014-05-10',
                'nama_sekolah' => 'SDN 1 Jakarta',
            ]
        );

        // 4. ORANG TUA
        User::updateOrCreate(
            ['email' => 'ortu@kodi.app'],
            [
                'name' => 'Mama Budi',
                'email' => 'ortu@kodi.app',
                'password' => Hash::make('mama123'),
                'role' => 'ortu',
                'nama_lengkap' => 'Ibu Rina',
                'koin' => 0,
            ]
        );

        $this->command->info('SEMUA USER BERHASIL DIBUAT!');
        $this->command->table(['Role', 'Email', 'Password'], [
            ['Admin', 'admin@kodi.app', 'admin'],
            ['Guru',  'guru@kodi.app',  'guru123'],
            ['Siswa', 'budi@kodi.app',  'budi123'],
            ['Ortu',  'ortu@kodi.app',  'mama123'],
        ]);
    }
}