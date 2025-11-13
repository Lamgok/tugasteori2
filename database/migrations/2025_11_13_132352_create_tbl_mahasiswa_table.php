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
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary(); 
            $table->string('nama_mahasiswa');
            $table->string('foto_url')->nullable();
            $table->string('username')->unique();
            $table->string('email_akademik')->unique();
            $table->year('angkatan');
            $table->date('tgl_masuk');
            $table->string('program_studi');
            $table->string('kelas');
            $table->string('wali_mahasiswa');
            $table->string('jalur_usm');
            $table->string('status_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mahasiswa');
    }
};