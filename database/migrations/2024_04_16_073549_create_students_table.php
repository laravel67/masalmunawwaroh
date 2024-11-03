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
            $table->string('no_pendaftaran');
            $table->foreignId('user_id');
            $table->foreignId('ta_id');
            $table->string('nama_lengkap', 255);
            $table->string('nama_panggilan', 50);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->text('alamat_asal');
            $table->char('nisn', 10)->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('anak_ke')->unsigned();
            $table->integer('jumlah_saudara')->unsigned();
            $table->string('penyakit_berat', 100)->nullable();
            $table->decimal('berat_badan', 5, 2)->unsigned();
            $table->decimal('tinggi_badan', 5, 2)->unsigned();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->string('hobi', 100);
            $table->string('cita_cita', 100);
            $table->enum('program_pilihan', ['Tahfidz', 'Umum']);
            $table->string('sekolah_asal', 255);
            $table->string('alamat_sekolah', 255);
            $table->char('npsn_sekolah', 8);
            $table->string('nsm_sekolah', 10)->nullable();
            $table->string('nomor_ijazah', 20);
            $table->string('nomor_skhu', 20)->nullable();
            $table->string('nomor_peserta_un', 20)->nullable();
            $table->decimal('nilai_bahasa_indonesia', 5, 2)->unsigned();
            $table->decimal('nilai_matematika', 5, 2)->unsigned();
            $table->decimal('nilai_ipa', 5, 2)->unsigned();
            $table->decimal('nilai_bahasa_inggris', 5, 2)->unsigned();
            $table->string('nama_ayah', 255);
            $table->string('tempat_lahir_ayah', 100);
            $table->string('pendidikan_ayah', 50);
            $table->string('pekerjaan_ayah', 100);
            $table->string('no_hp_ayah', 15);
            $table->string('alamat_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->string('tempat_lahir_ibu', 100);
            $table->string('pendidikan_ibu', 50);
            $table->string('pekerjaan_ibu', 100);
            $table->string('no_hp_ibu', 15);
            $table->string('alamat_ibu', 255);
            $table->string('photo', 255)->nullable();
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
