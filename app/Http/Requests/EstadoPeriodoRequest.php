<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EstadoPeriodoRequest extends FormRequest
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
            'NombreEstado' => [
                'required',
                'string',
                'in:activo,finalizado',
                'max:50',
                function ($attribute, $value, $fail) {
                    // Verificar si el valor ya existe en la base de datos
                    $existe = DB::table('estado_periodos')
                        ->where($attribute, $value)
                        ->exists();

                    if ($existe) {
                        $fail("Ya existe un registro con el estado '{$value}'.");
                    }
                },
            ],
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'NombreEstado.required' => 'El nombre del estado es obligatorio.',
            'NombreEstado.string' => 'El nombre del estado debe ser una cadena de texto.',
            'NombreEstado.in' => 'El estado debe ser "activo" o "finalizado".',
            'NombreEstado.max' => 'El estado no debe exceder los 50 caracteres.',
        ];
    }
}
