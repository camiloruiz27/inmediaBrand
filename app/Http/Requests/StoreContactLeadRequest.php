<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'nombre_completo' => ['required', 'string', 'max:120'],
            'empresa' => ['required', 'string', 'max:120'],
            'correo_corporativo' => ['required', 'email', 'max:160'],
            'telefono' => ['required', 'string', 'max:40'],
            'proyecto' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nombre_completo' => 'nombre completo',
            'correo_corporativo' => 'correo corporativo',
        ];
    }
}
