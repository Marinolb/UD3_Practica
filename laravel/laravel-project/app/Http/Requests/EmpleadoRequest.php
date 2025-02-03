<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
                    'nombre'             => 'required|string|max:255',
                    'email'              => 'required|email|unique:empleados,email',
                    'telefono'           => 'required|string|max:15',
                    'fecha_contratacion' => 'required|date',
                    'rol'                => 'required|string|max:100',
                ];

            case 'PUT':
            case 'PATCH':
                $empleadoId = $this->route('id'); 
                return [
                    'nombre'             => 'sometimes|required|string|max:255',
                    'email'              => "sometimes|required|email|unique:empleados,email,{$empleadoId}",
                    'telefono'           => 'sometimes|required|string|max:15',
                    'fecha_contratacion' => 'sometimes|required|date',
                    'rol'                => 'sometimes|required|string|max:100',
                ];

            default:
                return [];
        }
    }
    
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del empleado es obligatorio.',
            'nombre.string' => 'El nombre del empleado debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los :max caracteres.',

            'email.required' => 'El correo electrónico del empleado es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'telefono.required' => 'El teléfono del empleado es obligatorio.',
            'telefono.string' => 'El teléfono debe ser un texto.',
            'telefono.max' => 'El teléfono no puede superar los :max caracteres.',

            'fecha_contratacion.required' => 'La fecha de contratación es obligatoria.',
            'fecha_contratacion.date' => 'La fecha de contratación debe ser una fecha válida.',

            'rol.required' => 'El rol del empleado es obligatorio.',
            'rol.string' => 'El rol del empleado debe ser un texto.',
            'rol.max' => 'El rol no puede superar los :max caracteres.',
        ];
    }
}