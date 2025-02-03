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

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la tarea es obligatorio.',
            'nombre.string' => 'El nombre de la tarea debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los :max caracteres.',

            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',

            'fecha_fin.required' => 'La fecha de finalización es obligatoria.',
            'fecha_fin.date' => 'La fecha de finalización debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser mayor o igual que la de inicio.',

            'proyecto_id.required' => 'El proyecto es obligatorio.',
            'proyecto_id.exists' => 'El proyecto seleccionado no es válido.',

            'prioridad_id.required' => 'La prioridad es obligatoria.',
            'prioridad_id.exists' => 'La prioridad seleccionada no es válida.',

            'descripcion.required' => 'La descripción de la tarea es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los :max caracteres.',

            'estado.required' => 'El estado de la tarea es obligatorio.',
            'estado.in' => 'El estado de la tarea debe ser uno de los siguientes valores: pendiente, en progreso o completada.',
        ];
    }
}

