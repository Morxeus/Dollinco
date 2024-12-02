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
            'IDCurso' => 'required|exists:cursos,IDCurso',
            'IDAsignatura' => 'required|array',  // Asegura que sea un array
            'IDAsignatura.*' => 'exists:asignaturas,IDAsignatura',  // Cada elemento debe existir en asignaturas
            'NumeroMatricula' => 'required|exists:matriculas,NumeroMatricula',
        ];
    }
    
    
    
}
