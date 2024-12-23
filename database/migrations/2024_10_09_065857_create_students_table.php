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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('year_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('group_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('status');
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();


            $table->string('address')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('village')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();

            $table->string('living')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('language')->nullable();
            $table->string('range_home')->nullable();
            $table->string('childstatus')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('siblings')->nullable();

            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood')->nullable();
            $table->string('medical')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
