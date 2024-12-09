<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoOfrecidoRequest extends FormRequest
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
        $id = $this->route('curso_ofrecido') ?? 'NULL'; // Obtén el ID si es edición

        return [
            'Año' => 'required|date',
            'IDCurso' => 'required|exists:cursos,IDCurso',
            'Letra' => [
                'required',
                'string',
                'max:1',
                'regex:/^[A-Za-z]$/',
                "unique:curso_ofrecidos,Letra,{$id},IDCursoOfrecido",
            ],
            'Cupos' => 'required|integer|min:1',
            'IDPeriodo' => 'required|exists:periodos,IDPeriodo',
        ];
    }

    /**
     * Mensajes de error personalizados.
     */
    public function messages(): array
    {
        return [
            'Letra.unique' => 'Ya existe un curso ofrecido con esta misma letra.',
        ];
    }
}
