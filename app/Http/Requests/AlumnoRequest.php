<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlumnoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'RunAlumno' => [
                'required',
                'max:12',
                Rule::unique('alumnos', 'RunAlumno')->ignore($this->route('alumno')), // Excluir el registro actual al editar
                'regex:/^\d{1,2}\.\d{3}\.\d{3}-[\dkK]$/', // Valida el formato
                function($attribute, $value, $fail) {
                    // Si el formato es válido pero el RUT no es válido
                    if (!$this->isValidRUT($value)) {
                        $fail('El :attribute no es válido. Verifica si está escrito correctamente: ' . $value);
                    }
                },
            ],
            'Nombres' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'FechaNacimiento' => 'required|date|before_or_equal:' . now()->subYears(5)->format('Y-m-d'),
            'Genero' => 'required|in:M,F,O',
            'Direccion' => 'required|string|max:100',
        ];
    }

    /**
     * Método para verificar si el RUN es válido.
     */
    private function isValidRUT($rut): bool
    {
        // Eliminar puntos y guion
        $rut = str_replace(['.', '-'], '', $rut);
        $number = substr($rut, 0, -1);  // El número (sin el dígito verificador)
        $verifier = strtoupper(substr($rut, -1));  // El dígito verificador (letra o número)

        $sum = 0;
        $multiplier = 2;

        // Calcular la suma con el algoritmo del dígito verificador
        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $sum += $number[$i] * $multiplier;
            $multiplier = $multiplier === 7 ? 2 : $multiplier + 1;
        }

        // Calcular el dígito verificador
        $dv = 11 - ($sum % 11);
        $dv = $dv === 11 ? '0' : ($dv === 10 ? 'K' : (string)$dv);

        return $dv === $verifier;
    }
}
