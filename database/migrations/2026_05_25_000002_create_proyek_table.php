<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('emodule_id')->nullable()->constrained('e_modules')->nullOnDelete();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('link_proyek');
            $table->enum('status', ['menunggu', 'dinilai'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
