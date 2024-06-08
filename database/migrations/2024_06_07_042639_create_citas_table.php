<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_tipo_servicio');
            $table->timestamps();

            // Definir las llaves foráneas
            $table->foreign('id_paciente')->references('id')->on('paciente')->onDelete('cascade');
            $table->foreign('id_tipo_servicio')->references('id')->on('tipo_servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}