<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Http\Requests\ProyectoRequest;
use Illuminate\Http\Response;

class ProyectoController extends Controller
{
    public function index()
    {
        return response()->json(Proyecto::all(), 200);
    }

    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }
        return response()->json($proyecto, 200);
    }

    public function store(ProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->validated());
        return response()->json($proyecto, 201);
    }

    public function update(ProyectoRequest $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }
        $proyecto->update($request->validated());
        return response()->json($proyecto, 200);
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }
        $proyecto->delete();
        return response()->noContent();
    }
}
