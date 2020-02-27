<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->date('Fecha');
            $table->string('Tipo_viaje');
            $table->string('Coche_Matricula');
            $table->time('Hora'); // NO NULO
            $table->timestamps();
            
            $table->primary(['Fecha', 'Tipo_viaje', 'Coche_Matricula']);
            $table->foreign('Coche_Matricula')->references('Matricula')->on('coches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
