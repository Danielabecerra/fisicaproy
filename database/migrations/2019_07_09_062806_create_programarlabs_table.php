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
            $table->increments('id');
            $table->integer('id_m')->unsigned();
            $table->integer('id_d')->unsigned();
            $table->integer('id_h')->unsigned();
            $table->Integer('grupo', 100);
            $table->string('ambiente', 200);
            $table->Integer('gestion', 100);
            $table->Integer('cupo_max', 100);
            
            $table->timestamp();
            //relaciones
            $table->foreign('id_m')->references('id')->on('materias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            
            $table->foreign('id_d')->references('id')->on('docentes')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('id_h')->references('id')->on('horarios')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
