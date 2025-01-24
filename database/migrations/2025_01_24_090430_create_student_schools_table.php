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
        Schema::create('student_schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            // data masuk menjadi siswa baru
            $table->string('siswa_baru_pendidikan_sebelumnya')->nullable();
            $table->string('siswa_baru_nama_sekolah')->nullable();
            $table->string('siswa_baru_alamat_sekolah')->nullable();

            // data pendidikan dari sekolah lain (pindahan)
            $table->string('siswa_pindahan_nama_sekolah_asal')->nullable();
            $table->string('siswa_pindahan_pindah_dari_kelas')->nullable();
            $table->string('siswa_pindahan_diterima_tanggal')->nullable();
            $table->string('siswa_pindahan_di_kelas')->nullable();

            // beasiswa
            $table->string('beasiswa')->nullable();

            // tamat belajar
            $table->string('lulus_no_ijazah')->nullable();
            $table->string('lulus_lanjut_sekolah')->nullable();

            // pindah sekolah
            $table->string('pindah_sekolah_dari_kelas')->nullable();
            $table->string('pindah_sekolah_ke_sekolah')->nullable();
            $table->string('pindah_sekolah_ke_kelas')->nullable();
            $table->string('pindah_sekolah_alasan')->nullable();

            // keluar sekolah
            $table->string('keluar_sekolah_tanggal')->nullable();
            $table->string('keluar_sekolah_alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_schools');
    }
};
