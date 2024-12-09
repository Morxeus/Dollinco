<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EstadoMatriculaRequest extends FormRequest
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
            'EstadoMatricula' => [
                'required',
                'string',
                'in:Confirmada,Pendiente,Rechazada,Anulada,Suspendida,Finalizada',
                function ($attribute, $value, $fail) {
                    $existe = DB::table('estado_matriculas')
                        ->where($attribute, $value)
                        ->exists();
        
                    if ($existe) {
                        $fail("Ya existe un registro con el estado de matrÃ­cula '{$value}'.");
                    }
                },
            ],
        ];
        
    }
}
