<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MallaRequest extends FormRequest
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
			'IdMalla' => 'required',
			'NombreMalla' => 'required|string',
			'IdCurso' => 'required',
			'IdAsignatura' => 'required',
			'NumeroMatricula' => 'required',
			'RunProfesor' => 'required|string',
        ];
    }
}
