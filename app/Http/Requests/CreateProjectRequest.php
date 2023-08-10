<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'string'],
            'repo' => ['required', 'url', 'unique:projects,repo'],
            'privacy' => ['required', 'string'],
            'status' => ['required', 'string', 'min:5'],
            'limit_requets' => ['nullable', 'integer'],
            'user_id' => ['required', 'exists:users,id'],
            'created_at' => ['required', 'date']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 5 caracteres.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',

            'repo.required' => 'El enlace del repositorio es obligatorio.',
            'repo.url' => 'El enlace del repositorio debe ser una URL válida.',
            'repo.unique' => 'Este enlace de repositorio ya está en uso.',

            'privacy.required' => 'La privacidad es obligatoria.',
            'privacy.string' => 'La privacidad debe ser una cadena de caracteres.',

            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser una cadena de caracteres.',
            'status.min' => 'El estado debe tener al menos 5 caracteres.',

            'limit_requets.integer' => 'El límite de solicitudes debe ser un número entero.',

            'user_id.required' => 'El ID de usuario es obligatorio.',
            'user_id.exists' => 'El ID de usuario seleccionado no existe.',

            'created_at.required' => 'La fecha de creación es obligatoria.',
            'created_at.date' => 'La fecha de creación debe ser una fecha válida.',
        ];
    }
}
