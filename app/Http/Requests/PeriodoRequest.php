<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeriodoRequest extends FormRequest
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
            'FechaInicio' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $fecha = \Carbon\Carbon::parse($value);
                    $anio = $fecha->year; // Obtener el año
        
                    if ($fecha->month != 1) { // Comprobar que el mes sea enero
                        $fail('La fecha de inicio debe ser en enero.');
                    }
        
                    // Verificar si el año ya existe en la base de datos (excepto el período actual)
                    $idPeriodo = optional($this->route('periodo'))->IDPeriodo; // Evitar error si no existe
                    $existeAnio = DB::table('periodos')
                        ->whereYear('FechaInicio', $anio)
                        ->when($idPeriodo, function ($query, $idPeriodo) {
                            return $query->where('IDPeriodo', '!=', $idPeriodo);
                        })
                        ->exists();
        
                    if ($existeAnio) {
                        $fail("El año {$anio} ya está registrado para otro período.");
                    }
                },
            ],
            'FechaFin' => [
                'required', // Permitir nulos si el valor no se envía
                'date',
                function ($attribute, $value, $fail) {
                    $fechaInicio = \Carbon\Carbon::parse($this->input('FechaInicio')); // Obtener FechaInicio del request
        
                    if ($value) { // Si se proporciona FechaFin, realizar validaciones adicionales
                        $fechaFin = \Carbon\Carbon::parse($value);
        
                        if ($fechaFin->month != 12) { // Comprobar que el mes sea diciembre
                            $fail('La fecha de fin debe ser en diciembre.');
                        }
        
                        if ($fechaInicio->year != $fechaFin->year) { // Comprobar que los años coincidan
                            $fail('El año de la fecha de fin debe coincidir con el de la fecha de inicio.');
                        }
                    }
                },
            ],
            'IDPeriodoE' => 'required|numeric',
        ];
        
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'FechaInicio.required' => 'La fecha de inicio es obligatoria.',
            'FechaInicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'FechaFin.date' => 'La fecha de fin debe ser una fecha válida.',
            'IDPeriodoE.required' => 'El campo ID del periodo es obligatorio.',
            'IDPeriodoE.numeric' => 'El campo ID del periodo debe ser un número.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Si FechaFin no se proporciona, asignar un valor predeterminado
        if (!$this->input('FechaFin') && $this->input('FechaInicio')) {
            $this->merge([
                'FechaFin' => Carbon::parse($this->input('FechaInicio'))->endOfYear()->format('Y-m-d'),
            ]);
        }
    }
}