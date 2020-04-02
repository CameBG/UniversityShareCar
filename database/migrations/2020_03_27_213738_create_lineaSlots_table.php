<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('lineaSlots', function (Blueprint $table) {
            $table->unsignedBigInteger('slot_id');
            $table->unsignedInteger('numAsiento');
            $table->timestamps();

            $table->primary(['slot_id', 'numAsiento']);
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lineaSlots');
    }
}
