<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTareaTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_tarea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id'); 
            $table->unsignedBigInteger('tarea_id');
            $table->decimal('progreso', 5, 2); 
            $table->timestamps();
            
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleado_tarea');
    }
}
