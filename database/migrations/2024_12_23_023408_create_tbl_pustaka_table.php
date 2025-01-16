<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPustakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pustaka', function (Blueprint $table) {
            $table->id('id_pustaka'); // Auto increment field
            $table->integer('kode_pustaka'); // Kode pustaka
            $table->unsignedBigInteger('id_ddc'); // Foreign key to tbl_ddc
            $table->unsignedBigInteger('id_format'); // Foreign key to tbl_format
            $table->unsignedBigInteger('id_penerbit'); // Foreign key to tbl_penerbit
            $table->unsignedBigInteger('id_pengarang'); // Foreign key to tbl_pengarang
            $table->string('isbn', 20); // ISBN
            $table->string('judul_pustaka', 100); // Judul pustaka
            $table->string('tahun_terbit', 5); // Tahun terbit
            $table->string('keyword', 50); // Keyword
            $table->string('keterangan_fisik', 100); // Keterangan fisik
            $table->string('keterangan_tambahan', 100); // Keterangan tambahan
            $table->longText('abstraksi'); // Abstraksi
            $table->longText('gambar'); // Gambar pustaka
            $table->integer('harga_buku'); // Harga buku
            $table->string('kondisi_buku', 15); // Kondisi buku
            $table->enum('fp', ['0', '1']); // FP (0 atau 1)
            $table->tinyInteger('jml_pinjam'); // Jumlah pinjam
            $table->integer('denda_terlambat'); // Denda terlambat
            $table->integer('denda_hilang'); // Denda hilang
            $table->timestamps(); // Created at & Updated at

            // Adding foreign key constraints
            $table->foreign('id_ddc')->references('id_ddc')->on('tbl_ddc')->onDelete('cascade');
            $table->foreign('id_format')->references('id_format')->on('tbl_format')->onDelete('cascade');
            $table->foreign('id_penerbit')->references('id_penerbit')->on('tbl_penerbit')->onDelete('cascade');
            $table->foreign('id_pengarang')->references('id_pengarang')->on('tbl_pengarang')->onDelete('cascade');

            // Adding indexes on foreign keys (optional but recommended)
            $table->index('id_ddc');
            $table->index('id_format');
            $table->index('id_penerbit');
            $table->index('id_pengarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pustaka');
    }
}
