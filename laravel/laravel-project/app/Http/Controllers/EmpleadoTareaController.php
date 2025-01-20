<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoTarea;
use App\Http\Requests\EmpleadoTareaRequest;

class EmpleadoTareaController extends Controller
{
    public function index()
    {
        return response()->json(EmpleadoTarea::all(), 200);
    }

    public function show($id)
    {
        $empleadoTarea = EmpleadoTarea::find($id);
        if (!$empleadoTarea) {
            return response()->json(['message' => 'Asignación no encontrada'], 404);
        }
        return response()->json($empleadoTarea, 200);
    }

    public function store(EmpleadoTareaRequest $request)
    {
        $empleadoTarea = EmpleadoTarea::create($request->validated());
        return response()->json($empleadoTarea, 201);
    }

    public function update(EmpleadoTareaRequest $request, $id)
    {
        $empleadoTarea = EmpleadoTarea::find($id);
        if (!$empleadoTarea) {
            return response()->json(['message' => 'Asignación no encontrada'], 404);
        }
        $empleadoTarea->update($request->validated());
        return response()->json($empleadoTarea, 200);
    }

    public function destroy($id)
    {
        $empleadoTarea = EmpleadoTarea::find($id);
        if (!$empleadoTarea) {
            return response()->json(['message' => 'Asignación no encontrada'], 404);
        }
        $empleadoTarea->delete();
        return response()->noContent();
    }
}
