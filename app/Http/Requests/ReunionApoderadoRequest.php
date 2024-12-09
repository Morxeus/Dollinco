<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionApoderadoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'IdReunion' => 'required|exists:reunions,IdReunion',
            'TipoReunion' => 'required|in:General,Específica',
            'IdCurso' => 'required|exists:cursos,IDCurso',
            'asistencias' => 'nullable|array',
            'asistencias.*' => 'nullable|string|in:Sí,No',

        ];
    }

    public function messages(): array
    {
        return [
            'IdReunion.required' => 'Debe seleccionar una reunión.',
            'IdReunion.exists' => 'La reunión seleccionada no es válida.',
            'TipoReunion.required' => 'Debe seleccionar un tipo de reunión.',
            'TipoReunion.in' => 'El tipo de reunión debe ser General o Específica.',
            'IdCurso.required' => 'Debe seleccionar un curso.',
            'IdCurso.exists' => 'El curso seleccionado no es válido.',
            'asistencias.array' => 'El formato de las asistencias no es válido.',
            'asistencias.*.in' => 'Cada asistencia debe ser "Sí" o "No".',
        ];
    }

}
