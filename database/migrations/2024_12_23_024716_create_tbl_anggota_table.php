<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->id('id_anggota'); // Auto increment field
            $table->unsignedBigInteger('id_jenis_anggota'); // Foreign key to tbl_jenis_anggota
            $table->string('kode_anggota', 20)->unique(); // UNIQUE key for kode_anggota
            $table->string('nama_anggota', 50)->unique(); // UNIQUE key for nama_anggota
            $table->string('tempat', 20); // Tempat lahir
            $table->date('tgl_lahir'); // Tanggal lahir
            $table->string('alamat', 50); // Alamat
            $table->string('no_telp', 15); // Nomor telepon
            $table->string('email', 30)->nullable(); // Email
            $table->date('tgl_daftar'); // Tanggal daftar
            $table->date('masa_aktif'); // Masa aktif
            $table->enum('fa', ['Y', 'T']); // Status aktif (fa)
            $table->string('keterangan', 45)->nullable(); // Keterangan tambahan
            $table->longText('foto')->nullable(); // Foto anggota
            $table->string('username', 50)->unique(); // UNIQUE key for username
            $table->string('password', 50); // Password anggota
            $table->timestamps(); // Created at & Updated at

            // Indexes
            $table->foreign('id_jenis_anggota')->references('id_jenis_anggota')->on('tbl_jenis_anggota')->onDelete('cascade')->onUpdate('cascade'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_anggota');
    }
}
