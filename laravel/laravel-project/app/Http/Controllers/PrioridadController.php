<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use App\Http\Requests\PrioridadRequest;

class PrioridadController extends Controller
{
    public function index()
    {
        return response()->json(Prioridad::all(), 200);
    }

    public function show($id)
    {
        $prioridad = Prioridad::find($id);
        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], 404);
        }
        return response()->json($prioridad, 200);
    }

    public function store(PrioridadRequest $request)
    {
        $prioridad = Prioridad::create($request->validated());
        return response()->json($prioridad, 201);
    }

    public function update(PrioridadRequest $request, $id)
    {
        $prioridad = Prioridad::find($id);
        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], 404);
        }
        $prioridad->update($request->validated());
        return response()->json($prioridad, 200);
    }

    public function destroy($id)
    {
        $prioridad = Prioridad::find($id);
        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], 404);
        }
        $prioridad->delete();
        return response()->noContent();
    }
}
