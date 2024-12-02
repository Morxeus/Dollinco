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
                'in:Lenguaje y Comunicación,Matemática,Ciencias Naturales,Historia,Geografía y Ciencias Sociales,Educación Física y Salud,Artes Visuales,Música,Tecnología,Inglés,Religión',
                function ($attribute, $value, $fail) {
                    $existe = DB::table('asignaturas')
                        ->where($attribute, $value)
                        ->exists();

                    if ($existe) {
                        $fail("Ya existe un registro con la asignatura '{$value}'.");
                    }
                },
            ],
        ];
    }   
}
