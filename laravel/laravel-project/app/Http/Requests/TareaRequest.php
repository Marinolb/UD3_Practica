<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'nombre'        => 'required|string|max:255',
                    'fecha_inicio'  => 'required|date',
                    'fecha_fin'     => 'required|date|after_or_equal:fecha_inicio',
                    'proyecto_id'   => 'required|exists:proyectos,id',
                    'prioridad_id'  => 'required|exists:prioridades,id',
                    'descripcion'   => 'required|string|max:2000',
                    'estado'        => 'required|in:pendiente,en_progreso,completada',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'nombre'        => 'sometimes|required|string|max:255',
                    'fecha_inicio'  => 'sometimes|required|date',
                    'fecha_fin'     => 'sometimes|required|date|after_or_equal:fecha_inicio',
                    'proyecto_id'   => 'sometimes|required|exists:proyectos,id',
                    'prioridad_id'  => 'sometimes|required|exists:prioridades,id',
                    'descripcion'   => 'sometimes|required|string|max:2000',
                    'estado'        => 'sometimes|required|in:pendiente,en_progreso,completada',
                ];

            default:
                return [];
        }
    }
}
