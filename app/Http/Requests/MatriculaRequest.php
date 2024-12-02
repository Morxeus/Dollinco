<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
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
			'NumeroMatricula' => 'required|unique:matriculas,NumeroMatricula',
			'RunAlumno' => 'required|string|max:12',
			'RunApoderado' => 'required|string|max:12',
			'FechaInscripcion' => 'required|date',
			'IDMatriculaEstado' => 'required|numeric',
        ];
    }
}
