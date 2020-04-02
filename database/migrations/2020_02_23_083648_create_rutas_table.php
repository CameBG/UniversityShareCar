<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('localidad');
            $table->string('universidad');
            $table->timestamps();
            
            $table->unique(['localidad', 'universidad']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
