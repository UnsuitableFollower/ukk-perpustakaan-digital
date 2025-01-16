<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPengarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengarang', function (Blueprint $table) {
            $table->id('id_pengarang'); // Auto increment field
            $table->string('kode_pengarang', 10)->unique(); // UNIQUE key for kode_pengarang
            $table->string('gelar_depan', 10)->nullable(); // Gelar depan
            $table->string('nama_pengarang', 50)->unique(); // UNIQUE key for nama_pengarang
            $table->string('gelar_belakang', 10)->nullable(); // Gelar belakang
            $table->string('no_telp', 15)->nullable(); // Nomor telepon
            $table->string('email', 30)->nullable(); // Email
            $table->string('website', 50)->nullable(); // Website
            $table->longText('biografi')->nullable(); // Biografi pengarang
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
        Schema::dropIfExists('tbl_pengarang');
    }
}
