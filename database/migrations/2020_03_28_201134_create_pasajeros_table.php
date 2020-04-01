<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->string('Correo');
            $table->string('Nombre');
            $table->unsignedInteger('Edad');
            $table->string('Genero')->nullable();           
            $table->string('Imagen')->nullable();
            $table->string('Telefono', 9)->nullable();
            $table->timestamps();

            $table->primary('Correo');
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
