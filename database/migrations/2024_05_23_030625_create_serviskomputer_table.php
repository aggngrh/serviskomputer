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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('jabatan', ['Teknisi', 'Admin','SPV']);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('nama_customer');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('customer');
    }
};
