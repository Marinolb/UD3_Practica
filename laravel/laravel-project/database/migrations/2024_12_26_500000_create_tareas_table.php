<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('proyecto_id');  
            $table->unsignedBigInteger('prioridad_id');
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'en_progreso', 'completada']);
            $table->timestamps();
            
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('prioridad_id')->references('id')->on('prioridades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
