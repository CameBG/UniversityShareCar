<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('direccion');
            $table->string('coche_matricula');
            $table->timestamps();
            
            $table->foreign('coche_matricula')->references('matricula')->on('coches')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
