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
      Schema::create('karyawan', function (Blueprint $table) {
    $table->id();
    $table->string('nip')->unique(); 
    $table->string('nama_lengkap');
    $table->string('email')->unique();
    $table->string('telepon')->nullable();
    $table->string('no_ktp', 20)->nullable();
    $table->string('npwp')->nullable();
    $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable(); 
    $table->date('tanggal_lahir')->nullable();
    $table->string('tempat_lahir')->nullable();
    $table->text('alamat')->nullable();

    $table->foreignId('id_jabatan')->constrained('jabatan')->restrictOnDelete();
    $table->foreignId('id_departemen')->constrained('departemen')->restrictOnDelete();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
