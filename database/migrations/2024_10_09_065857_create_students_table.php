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

            // data diri
            $table->string('nama');
            $table->string('status_siswa');
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();

            // alamat
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();

            // keadaan siswa
            $table->string('tinggal_bersama')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('jarak_rumah')->nullable();
            $table->string('status_anak')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('saudara')->nullable();

            // data fisik
            $table->string('tinggi')->nullable();
            $table->string('berat')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('riwayat_penyakit')->nullable();

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
