<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadesTable extends Migration
{
    public function up()
    {
        Schema::create('prioridades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prioridades');
    }
}
