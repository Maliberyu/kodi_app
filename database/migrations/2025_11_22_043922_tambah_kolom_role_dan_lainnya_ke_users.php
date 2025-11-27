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
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom role kalau sudah ada (biar gak error)
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }

            // Tambah kolom role baru (bisa admin, guru, siswa, ortu)
            $table->string('role')->default('siswa')->after('email');

            // Kolom tambahan buat KODI (super keren buat anak SD)
            $table->string('nama_lengkap')->nullable()->after('name');
            $table->string('kelas')->nullable();                    // contoh: 5A, 6B
            $table->integer('streak')->default(0);                  // hari beruntun belajar
            $table->integer('koin')->default(100);                  // mata uang dalam app
            $table->string('avatar')->default('robot-biru.png');    // kostum robot
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
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