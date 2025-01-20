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
}
