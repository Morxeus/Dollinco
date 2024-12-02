<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionRequest extends FormRequest
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
			'IdReunion' => 'required',
			'TipoReunion' => 'required|string',
			'FechaInicio' => 'required',
			'FechaFin' => 'required',
			'DescripcionReunion' => 'string',
			'RunProfesor' => 'required|string',
        ];
    }
}
