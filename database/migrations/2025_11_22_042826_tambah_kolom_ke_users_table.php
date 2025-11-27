<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable();
            $table->string('kelas')->nullable();           // ex: "5A", "6B"
            $table->enum('role', ['siswa', 'guru', 'ortu'])->default('siswa');
            $table->integer('streak')->default(0);
            $table->integer('koin')->default(0);
            $table->string('avatar')->default('robot1.png');
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nama_lengkap', 'kelas', 'role', 'streak', 'koin',
                'avatar', 'tanggal_lahir', 'nama_sekolah', 'is_active', 'last_login_at'
            ]);
        });
    }
};