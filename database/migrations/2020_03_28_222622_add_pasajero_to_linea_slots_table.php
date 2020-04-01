<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasajeroToLineaSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linea_slots', function (Blueprint $table) {
            $table->string('Pasajero_id')->nullable();

            $table->foreign('Pasajero_id')->references('Correo')->on('pasajeros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('linea_slots', function (Blueprint $table) {
            $table->dropForeign('linea_slots_Pasajero_id_foreign');
            
            $table->dropColumn('Pasajero_id');
        });
    }
}
