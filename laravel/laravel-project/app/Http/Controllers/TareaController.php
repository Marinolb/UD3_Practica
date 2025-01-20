<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Requests\TareaRequest;

class TareaController extends Controller
{
    public function index()
    {
        return response()->json(Tarea::all(), 200);
    }

    public function show($id)
    {
        $tarea = Tarea::find($id);
        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }
        return response()->json($tarea, 200);
    }

    public function store(TareaRequest $request)
    {
        $tarea = Tarea::create($request->validated());
        return response()->json($tarea, 201);
    }

    public function update(TareaRequest $request, $id)
    {
        $tarea = Tarea::find($id);
        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }
        $tarea->update($request->validated());
        return response()->json($tarea, 200);
    }

    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }
        $tarea->delete();
        return response()->noContent();
    }
}
