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
}
