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
        Schema::create('report_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('kelas_1a')->nullable();
            $table->string('kelas_1b')->nullable();
            $table->string('kelas_2a')->nullable();
            $table->string('kelas_2b')->nullable();
            $table->string('kelas_3a')->nullable();
            $table->string('kelas_3b')->nullable();
            $table->string('kelas_4a')->nullable();
            $table->string('kelas_4b')->nullable();
            $table->string('kelas_5a')->nullable();
            $table->string('kelas_5b')->nullable();
            $table->string('kelas_6a')->nullable();
            $table->string('kelas_6b')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_cards');
    }
};
