<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenerbitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penerbit', function (Blueprint $table) {
            $table->id('id_penerbit'); // Auto increment field
            $table->string('kode_penerbit', 10)->unique(); // UNIQUE key for kode_penerbit
            $table->string('nama_penerbit', 50)->unique(); // UNIQUE key for nama_penerbit
            $table->string('alamat_penerbit', 5000); // Alamat penerbit
            $table->string('no_telp', 15)->nullable(); // Nomor telepon
            $table->string('email', 30)->nullable(); // Email
            $table->string('fax', 15)->nullable(); // Fax
            $table->string('website', 50)->nullable(); // Website
            $table->string('kontak', 50)->nullable(); // Kontak person
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
        Schema::dropIfExists('tbl_penerbit');
    }
}
