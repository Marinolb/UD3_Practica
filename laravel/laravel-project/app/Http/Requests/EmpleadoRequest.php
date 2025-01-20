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
}
