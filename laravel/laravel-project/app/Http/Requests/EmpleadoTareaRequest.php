<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoTareaRequest extends FormRequest
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
                    'empleado_id' => 'required|exists:empleados,id',
                    'tarea_id'    => 'required|exists:tareas,id',
                    'progreso'    => 'required|numeric|min:0|max:100',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'empleado_id' => 'sometimes|required|exists:empleados,id',
                    'tarea_id'    => 'sometimes|required|exists:tareas,id',
                    'progreso'    => 'sometimes|required|numeric|min:0|max:100',
                ];

            default:
                return [];
        }
    }
    
    public function messages()
    {
        return [
            'empleado_id.required' => 'El empleado es obligatorio.',
            'empleado_id.exists' => 'El empleado seleccionado no es válido.',

            'tarea_id.required' => 'La tarea es obligatoria.',
            'tarea_id.exists' => 'La tarea seleccionada no es válida.',

            'progreso.required' => 'El progreso es obligatorio.',
            'progreso.numeric' => 'El progreso debe ser un número.',
            'progreso.min' => 'El progreso no puede ser menor a :min%.',
            'progreso.max' => 'El progreso no puede ser mayor a :max%.',
        ];
    }
}
