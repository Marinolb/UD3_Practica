<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Http\Requests\ComentarioRequest;

class ComentarioController extends Controller
{
    public function index()
    {
        return response()->json(Comentario::all(), 200);
    }

    public function show($id)
    {
        $comentario = Comentario::find($id);
        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }
        return response()->json($comentario, 200);
    }

    public function store(ComentarioRequest $request)
    {
        $comentario = Comentario::create($request->validated());
        return response()->json($comentario, 201);
    }

    public function update(ComentarioRequest $request, $id)
    {
        $comentario = Comentario::find($id);
        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }
        $comentario->update($request->validated());
        return response()->json($comentario, 200);
    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        if (!$comentario) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }
        $comentario->delete();
        return response()->noContent();
    }
}
