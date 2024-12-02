<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfesorDirectorRequest extends FormRequest
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
            'RunProfesor' => [
                'required',
                'max:12',
                Rule::unique('profesor_directors', 'RunProfesor')->ignore($this->route('profesorDirector')), // Ignora el registro actual al editar
                'regex:/^\d{1,2}\.\d{3}\.\d{3}-[\dkK]$/', // Valida el formato del RUT
                function ($attribute, $value, $fail) {
                    // Valida el dígito verificador del RUT
                    if (!$this->isValidRUT($value)) {
                        $fail('El :attribute no es válido. Verifique que esté correctamente escrito.');
                    }
                },
            ],
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Correo' => [
                'required',
                'max:150',
                'email',
                Rule::unique('profesor_directors', 'Correo')->ignore($this->route('profesorDirector')),
            ],
            'telefono' => 'nullable|string|max:15',
        ];
    }

    /**
     * Método para validar el RUT.
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

    /**
     * Método para validar correos electrónicos permitidos.
     */
    private function isValidEmail($email): bool
    {
        // Comprobación personalizada del dominio del correo
        $allowedDomains = ['gmail.com', 'gmail.cl', 'outlook.com', 'hotmail.com', 'yahoo.com', 'yahoo.cl', 'outlook.cl', 'hotmail.cl', 'virginiogomez.cl'];
        $domain = substr(strrchr($email, "@"), 1); // Extrae el dominio del correo

        return in_array($domain, $allowedDomains);
    }
}
