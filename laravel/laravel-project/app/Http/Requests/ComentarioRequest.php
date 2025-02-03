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
    public function messages()
    {
        return [
            'tarea_id.required' => 'La tarea es obligatoria.',
            'tarea_id.exists' => 'La tarea seleccionada no es válida.',

            'empleado_id.required' => 'El empleado es obligatorio.',
            'empleado_id.exists' => 'El empleado seleccionado no es válido.',

            'comentario.required' => 'El comentario es obligatorio.',
            'comentario.string' => 'El comentario debe ser un texto.',
            'comentario.max' => 'El comentario no puede superar los :max caracteres.',
        ];
    }
}
