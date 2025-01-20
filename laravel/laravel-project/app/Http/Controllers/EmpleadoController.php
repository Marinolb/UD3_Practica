<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\EmpleadoRequest;

class EmpleadoController extends Controller
{
    public function index()
    {
        return response()->json(Empleado::all(), 200);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json($empleado, 200);
    }

    public function store(EmpleadoRequest $request)
    {
        $empleado = Empleado::create($request->validated());
        return response()->json($empleado, 201);
    }

    public function update(EmpleadoRequest $request, $id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleado->update($request->validated());
        return response()->json($empleado, 200);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleado->delete();
        return response()->noContent();
    }
}
