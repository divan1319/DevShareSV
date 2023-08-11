<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'project_id'=>['required','exists:projects,id'],
            'technology_id'=> ['required','array']
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'El Proyecto es requerido.',
            'project_id.exists' => 'Este proyecto no existe o no sea creado.',
            'technology_id.required' => 'Las tecnologias son requeridas',
            'technology_id.array' => 'No se pueden insertar este tipo de dato'
        ];
    }
}
