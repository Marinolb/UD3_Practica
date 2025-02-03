<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrioridadRequest extends FormRequest
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
                    'nombre'     => 'required|string|max:255',
                    'descripcion'=> 'required|string|max:1000',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'nombre'     => 'sometimes|required|string|max:255',
                    'descripcion'=> 'sometimes|required|string|max:1000',
                ];

            default:
                return [];
        }
    }
    
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la prioridad es obligatorio.',
            'nombre.string' => 'El nombre de la prioridad debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los :max caracteres.',

            'descripcion.required' => 'La descripción de la prioridad es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los :max caracteres.',
        ];
    }
}