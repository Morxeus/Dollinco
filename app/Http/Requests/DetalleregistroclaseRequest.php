<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleregistroclaseRequest extends FormRequest
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
            'NotaEvaluacion' => 'nullable|numeric|min:1|max:7',
            'IdRegistroClases' => 'required|exists:registroclases,IdRegistroClases',
            'NumeroMatricula' => 'required|exists:matriculas,NumeroMatricula',
            'Asistencias' => 'nullable|array',
            'Asistencias.*' => 'boolean',
        ];
    }
}
