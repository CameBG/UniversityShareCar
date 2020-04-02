<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorsTable extends Migration
{
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->string('correo');
            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->date('fechaNacimiento');
            $table->string('genero')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('rutaImagen')->nullable();
            $table->unsignedBigInteger('ruta_id');
            $table->string('puntoRecogida');
            $table->timestamps();

            $table->primary('correo');
            $table->foreign('ruta_id')->references('id')->on('rutas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conductors');
    }
}
