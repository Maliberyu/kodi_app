<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quizizz_codes', function (Blueprint $table) {
            if (!Schema::hasColumn('quizizz_codes', 'guru_id')) {
                $table->foreignId('guru_id')
                      ->after('id')
                      ->constrained('users')
                      ->onDelete('cascade');
            }
            if (!Schema::hasColumn('quizizz_codes', 'kode_quiz')) {
                $table->string('kode_quiz')->after('guru_id');
            }
            if (!Schema::hasColumn('quizizz_codes', 'judul')) {
                $table->string('judul')->nullable()->after('kode_quiz');
            }
            if (!Schema::hasColumn('quizizz_codes', 'emblem')) {
                $table->string('emblem')->nullable()->after('judul');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quizizz_codes', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropColumn(['guru_id', 'kode_quiz', 'judul', 'emblem']);
        });
    }
};
