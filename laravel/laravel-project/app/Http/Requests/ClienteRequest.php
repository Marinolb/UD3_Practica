<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
                    'nombre'    => 'required|string|max:255',
                    'telefono'  => 'required|string|max:20',
                    'email'     => 'required|email|unique:clientes,email',
                    'direccion' => 'required|string|max:255',
                ];

            case 'PUT':
            case 'PATCH':
                $clienteId = $this->route('id'); 
                return [
                    'nombre'    => 'sometimes|required|string|max:255',
                    'telefono'  => 'sometimes|required|string|max:20',
                    'email'     => "sometimes|required|email|unique:clientes,email,{$clienteId}",
                    'direccion' => 'sometimes|required|string|max:255',
                ];

            default:
                return [];
        }
    }
    
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'nombre.string' => 'El nombre del cliente debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los :max caracteres.',

            'telefono.required' => 'El teléfono del cliente es obligatorio.',
            'telefono.string' => 'El teléfono debe ser un texto.',
            'telefono.max' => 'El teléfono no puede superar los :max caracteres.',

            'email.required' => 'El correo electrónico del cliente es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'direccion.required' => 'La dirección del cliente es obligatoria.',
            'direccion.string' => 'La dirección debe ser un texto.',
            'direccion.max' => 'La dirección no puede superar los :max caracteres.',
        ];
    }
}
