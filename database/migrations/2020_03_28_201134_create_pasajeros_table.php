<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajerosTable extends Migration
{
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->string('correo');
            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->date('fechaNacimiento');
            $table->string('genero')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('rutaImagen')->nullable();
            $table->timestamps();

            $table->primary('correo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasajeros');
    }
}
