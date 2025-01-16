<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJenisAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jenis_anggota', function (Blueprint $table) {
            $table->id('id_jenis_anggota'); // Auto increment field, PRIMARY KEY
            $table->string('kode_jenis_anggota', 25)->unique(); // Kode jenis anggota dengan indeks UNIQUE
            $table->string('jenis_anggota', 15); // Jenis anggota
            $table->string('max_pinjam', 5); // Maksimal pinjaman
            $table->string('keterangan', 50)->nullable(); // Keterangan tambahan
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_jenis_anggota');
    }
}
