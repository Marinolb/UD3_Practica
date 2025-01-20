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
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser mayor o igual que la de inicio.',
            
        ];
    }
}
