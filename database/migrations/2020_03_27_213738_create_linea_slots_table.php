<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('Slot_id');
            $table->unsignedInteger('numAsiento');
            $table->timestamps();

            $table->foreign('Slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->primary(['Slot_id', 'numAsiento']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_slots');
    }
}
