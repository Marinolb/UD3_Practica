<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\EmpleadoTareaController;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando correctamente'], 200);
});

// Proyectos
Route::get('proyectos', [ProyectoController::class, 'index']);
Route::get('proyectos/{id}', [ProyectoController::class, 'show']);
Route::post('proyectos', [ProyectoController::class, 'store']);
Route::put('proyectos/{id}', [ProyectoController::class, 'update']);
Route::delete('proyectos/{id}', [ProyectoController::class, 'destroy']);

// Tareas
Route::get('tareas', [TareaController::class, 'index']);
Route::get('tareas/{id}', [TareaController::class, 'show']);
Route::post('tareas', [TareaController::class, 'store']);
Route::put('tareas/{id}', [TareaController::class, 'update']);
Route::delete('tareas/{id}', [TareaController::class, 'destroy']);

// Empleados
Route::get('empleados', [EmpleadoController::class, 'index']);
Route::get('empleados/{id}', [EmpleadoController::class, 'show']);
Route::post('empleados', [EmpleadoController::class, 'store']);
Route::put('empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('empleados/{id}', [EmpleadoController::class, 'destroy']);

// Comentarios
Route::get('comentarios', [ComentarioController::class, 'index']);
Route::get('comentarios/{id}', [ComentarioController::class, 'show']);
Route::post('comentarios', [ComentarioController::class, 'store']);
Route::put('comentarios/{id}', [ComentarioController::class, 'update']);
Route::delete('comentarios/{id}', [ComentarioController::class, 'destroy']);

// Clientes
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::delete('clientes/{id}', [ClienteController::class, 'destroy']);

// Prioridades
Route::get('prioridades', [PrioridadController::class, 'index']);
Route::get('prioridades/{id}', [PrioridadController::class, 'show']);
Route::post('prioridades', [PrioridadController::class, 'store']);
Route::put('prioridades/{id}', [PrioridadController::class, 'update']);
Route::delete('prioridades/{id}', [PrioridadController::class, 'destroy']);

// EmpleadoTarea
Route::get('empleado_tarea', [EmpleadoTareaController::class, 'index']);
Route::get('empleado_tarea/{id}', [EmpleadoTareaController::class, 'show']);
Route::post('empleado_tarea', [EmpleadoTareaController::class, 'store']);
Route::put('empleado_tarea/{id}', [EmpleadoTareaController::class, 'update']);
Route::delete('empleado_tarea/{id}', [EmpleadoTareaController::class, 'destroy']);
