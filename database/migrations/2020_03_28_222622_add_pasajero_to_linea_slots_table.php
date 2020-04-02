<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasajeroToLineaSlotsTable extends Migration
{
    public function up()
    {
        Schema::table('lineaSlots', function (Blueprint $table) {
            $table->string('pasajero_correo')->nullable();

            $table->foreign('pasajero_correo')->references('correo')->on('pasajeros');
        });
    }

    public function down()
    {
        Schema::table('lineaSlots', function (Blueprint $table) {
            $table->dropForeign('lineaSlots_pasajero_correo_foreign');
            
            $table->dropColumn('pasajero_correo');
        });
    }
}
