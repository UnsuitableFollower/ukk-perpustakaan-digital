<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTglTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tgl_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi'); // Auto increment field
            $table->unsignedBigInteger('id_pustaka'); // Foreign key to tbl_pustaka
            $table->unsignedBigInteger('id_anggota'); // Foreign key to tbl_anggota
            $table->date('tgl_pinjam'); // Tanggal pinjam
            $table->date('tgl_kembali'); // Tanggal kembali (estimasi)
            $table->date('tgl_pengembalian')->nullable(); // Tanggal pengembalian (real)
            $table->enum('fp', ['0', '1']); // Field untuk status tertentu
            $table->string('keterangan', 5000)->nullable(); // Catatan tambahan
            $table->timestamps(); // Created at & Updated at

            // Indexes
            $table->foreign('id_pustaka')->references('id_pustaka')->on('tbl_pustaka')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_anggota')->references('id_anggota')->on('tbl_anggota')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tgl_transaksi');
    }
}
