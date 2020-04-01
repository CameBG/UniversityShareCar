<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->string('Correo');
            $table->string('Nombre');
            $table->unsignedInteger('Edad');
            $table->timestamps();
            $table->unsignedBigInteger('Ruta_id');
            $table->string('Punto_de_Recogida');

            $table->primary('Correo');
            $table->foreign('Ruta_id')->references('id')->on('rutas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductors');
    }
}
