<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramarlabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programarlabs', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_m');
            $table->foreign('id_m')->references('id')->on('materias');
            $table->unsignedInteger('id_d');
            $table->foreign('id_d')->references('id')->on('docentes');
            $table->Integer('cupo');
            $table->Integer('grupo');
            $table->string('ambiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programarlabs');
    }
}
