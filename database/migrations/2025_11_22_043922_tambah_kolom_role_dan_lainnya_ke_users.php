<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kolom-kolom ini mungkin sudah dibuat oleh migration sebelumnya,
        // jadi hanya tambahkan yang belum ada.
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom role baru (bisa admin, guru, siswa, ortu)
            $table->string('role')->default('siswa')->after('email');

            // Kolom tambahan buat KODI (super keren buat anak SD)
            $columns = [
                'nama_lengkap'  => fn () => $table->string('nama_lengkap')->nullable()->after('name'),
                'kelas'         => fn () => $table->string('kelas')->nullable(),                 // contoh: 5A, 6B
                'streak'        => fn () => $table->integer('streak')->default(0),               // hari beruntun belajar
                'koin'          => fn () => $table->integer('koin')->default(100),               // mata uang dalam app
                'avatar'        => fn () => $table->string('avatar')->default('robot-biru.png'), // kostum robot
                'tanggal_lahir' => fn () => $table->date('tanggal_lahir')->nullable(),
                'nama_sekolah'  => fn () => $table->string('nama_sekolah')->nullable(),
                'is_active'     => fn () => $table->boolean('is_active')->default(true),
                'last_login_at' => fn () => $table->timestamp('last_login_at')->nullable(),
            ];

            foreach ($columns as $name => $add) {
                if (! Schema::hasColumn('users', $name)) {
                    $add();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'nama_lengkap', 'kelas', 'streak', 'koin',
                'avatar', 'tanggal_lahir', 'nama_sekolah', 'is_active', 'last_login_at'
            ]);
        });
    }
};