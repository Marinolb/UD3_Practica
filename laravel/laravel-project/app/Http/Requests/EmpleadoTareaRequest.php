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
}
