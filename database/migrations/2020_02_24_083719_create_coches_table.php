<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->string('Matricula');
            $table->string('Marca');
            $table->string('Modelo');
            $table->unsignedInteger('Plazas'); //NO NULO
            $table->double('Precio'); //NO NULO
            $table->string('Conductor_Correo');
            $table->timestamps();

            $table->primary('Matricula');
            $table->foreign('Conductor_Correo')->references('Correo')->on('conductors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coches');
    }
}
