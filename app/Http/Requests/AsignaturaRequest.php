<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class AsignaturaRequest extends FormRequest
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
            'NombreAsignatura' => [
                'required',
                'string',
                'max:255', // Limita el tamaño del texto ingresado
                function ($attribute, $value, $fail) {
                    // Validar que no exista un registro duplicado en la tabla 'asignaturas'
                    $existe = DB::table('asignaturas')
                        ->where($attribute, $value)
                        ->exists();

                    if ($existe) {
                        $fail("La asignatura '{$value}' ya está registrada.");
                    }
                },
            ],
        ];
    }
}
