<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koding_proyek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('users')->cascadeOnDelete();
            $table->string('judul')->default('Proyek Tanpa Nama');
            $table->longText('kode_xml');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koding_proyek');
    }
};
