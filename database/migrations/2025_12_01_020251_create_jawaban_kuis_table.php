<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jawaban_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            $table->foreignId('emodul_id')->constrained('e_modules')->onDelete('cascade');
            $table->char('jawaban_siswa', 1);
            $table->integer('poin_didapat')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'kuis_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jawaban_kuis');
    }
};
