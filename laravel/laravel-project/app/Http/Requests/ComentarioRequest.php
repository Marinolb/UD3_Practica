<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
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
                    'tarea_id'     => 'required|exists:tareas,id',
                    'empleado_id'  => 'required|exists:empleados,id',
                    'comentario'   => 'required|string|max:500',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'tarea_id'     => 'sometimes|required|exists:tareas,id',
                    'empleado_id'  => 'sometimes|required|exists:empleados,id',
                    'comentario'   => 'sometimes|required|string|max:500',
                ];

            default:
                return [];
        }
    }
}
