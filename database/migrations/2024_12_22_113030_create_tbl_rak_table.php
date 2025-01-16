<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rak', function (Blueprint $table) {
            $table->id('id_rak'); 
            $table->string('kode_rak', 10)->unique(); 
            $table->string('rak', 25)->unique(); 
            $table->string('keterangan', 50); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rak');
    }
}
