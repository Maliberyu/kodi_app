<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('quizzes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('guru_id');
        $table->string('title');
        $table->text('description')->nullable();
        $table->timestamps();

        $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
