<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ddc', function (Blueprint $table) {
            $table->id('id_ddc'); // Auto increment field
            $table->unsignedBigInteger('id_rak'); // Foreign key to tbl_rak
            $table->string('kode_ddc', 10)->unique(); // UNIQUE key for kode_ddc
            $table->string('ddc', 100)->unique(); // UNIQUE key for ddc
            $table->string('keterangan', 100); // Description field
            $table->timestamps(); // Created at & Updated at

            // Adding the foreign key constraint
            $table->foreign('id_rak')->references('id_rak')->on('tbl_rak')->onDelete('cascade');

            // Adding index on foreign key
            $table->index('id_rak', 'fk_id_rak_idx'); // Index for the foreign key (optional but recommended)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ddc');
    }
}
