<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
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
                    'nombre'       => 'required|string|max:255',
                    'descripcion'  => 'required|string|max:1000',
                    'fecha_inicio' => 'required|date',
                    'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
                    'presupuesto'  => 'required|numeric|min:0',
                    'estado'       => 'required|in:activo,completado,en_pausa,en_progreso',
                    'cliente_id'   => 'required|exists:clientes,id',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'nombre'       => 'sometimes|required|string|max:255',
                    'descripcion'  => 'sometimes|required|string|max:1000',
                    'fecha_inicio' => 'sometimes|required|date',
                    'fecha_fin'    => 'sometimes|required|date|after_or_equal:fecha_inicio',
                    'presupuesto'  => 'sometimes|required|numeric|min:0',
                    'estado'       => 'sometimes|required|in:activo,completado,en_pausa,en_progreso',
                    'cliente_id'   => 'sometimes|required|exists:clientes,id',
                ];

            default:
                return [];
        }
    }

    public function messages()
    {
        return [
           'nombre.required' => 'El nombre del proyecto es obligatorio.',
            'nombre.string' => 'El nombre del proyecto debe ser un texto.',
            'nombre.max' => 'El nombre del proyecto no puede superar los :max caracteres.',
            
            'descripcion.required' => 'La descripción del proyecto es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los :max caracteres.',
            
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',

            'fecha_fin.required' => 'La fecha de finalización es obligatoria.',
            'fecha_fin.date' => 'La fecha de finalización debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser mayor o igual que la de inicio.',
            
            'presupuesto.required' => 'El presupuesto es obligatorio.',
            'presupuesto.numeric' => 'El presupuesto debe ser un número.',
            'presupuesto.min' => 'El presupuesto debe ser al menos :min.',

            'estado.required' => 'El estado del proyecto es obligatorio.',
            'estado.in' => 'El estado del proyecto debe ser uno de los siguientes valores: activo, completado, en pausa o en progreso.',

            'cliente_id.required' => 'El cliente es obligatorio.',
            'cliente_id.exists' => 'El cliente seleccionado no es válido.',
            
        ];
    }
}
