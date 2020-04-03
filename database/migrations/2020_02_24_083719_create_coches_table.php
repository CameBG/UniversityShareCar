<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCochesTable extends Migration
{
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->string('matricula');
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->unsignedInteger('plazas');
            $table->double('precioViaje');
            $table->string('rutaImagen')->nullable();
            $table->string('conductor_correo');
            $table->timestamps();

            $table->primary('matricula');
            $table->foreign('conductor_correo')->references('correo')->on('conductors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('coches');
    }
}
