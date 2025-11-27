<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/2025_11_26_123456_create_e_modules_table.php
// Catatan: Simpan link PDF Google Drive / Dropbox di kolom pdf_link

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('e_modules', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('klasifikasi'); // Matematika, IPA, dll
            $table->text('keterangan');
            $table->text('pdf_link')->nullable(); // Link PDF eksternal
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Guru yang input
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('e_modules');
    }
};