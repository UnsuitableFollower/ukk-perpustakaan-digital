<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_format', function (Blueprint $table) {
            $table->id('id_format'); // Auto increment field
            $table->string('kode_format', 50)->unique(); // UNIQUE key for kode_format
            $table->string('format', 25)->unique(); // UNIQUE key for format
            $table->string('keterangan', 50)->nullable(); // Keterangan field
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
        Schema::dropIfExists('tbl_format');
    }
}
