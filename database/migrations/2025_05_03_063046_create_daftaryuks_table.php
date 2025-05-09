<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftaryuks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Tabel peran (admin, panitia, mahasiswa)
        Schema::create('peran', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Contoh: admin, panitia, mahasiswa
            $table->timestamps();
        });

        // Tabel pengguna
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_terverifikasi')->nullable();
            $table->string('password');
            $table->foreignId('peran_id')->constrained('peran')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel kegiatan
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });

        //  Tabel kegiatan_panitia 
        Schema::create('kegiatan_panitia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatan')->onDelete('cascade');
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['kegiatan_id', 'pengguna_id']); // Mencegah duplikat
        });

        // Tabel pendaftaran kegiatan
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->foreignId('kegiatan_id')->constrained('kegiatan')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel kehadiran
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->boolean('hadir')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kehadiran');
        Schema::dropIfExists('pendaftaran');
        Schema::dropIfExists('kegiatan_panitia'); // harus dihapus dulu sebelum 'kegiatan'
        Schema::dropIfExists('kegiatan');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('peran');
        Schema::dropIfExists('daftaryuks');
    }
};
