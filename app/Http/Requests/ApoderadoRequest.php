<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApoderadoRequest extends FormRequest
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
            'RunApoderado' => [
                'required',
                'max:12',
                Rule::unique('apoderados', 'RunApoderado')->ignore($this->route('apoderado')),
                function ($attribute, $value, $fail) {
                    if (!$this->isValidRUT($value)) {
                        $fail('El :attribute no es válido. Verifica si está escrito correctamente: ' . $value);
                    }
                },
            ],
            'Nombres' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'Correo' => [
                'required',
                'max:150',
                'email', 
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                function ($attribute, $value, $fail) {
                    if (!$this->isValidEmail($value)) {
                        $fail('El :attribute no es válido. Solo se permiten correos de dominios autorizados.');
                    }
                },
            ],
            'Telefono' => [
                'nullable',
                'string',
                'regex:/^\+?[0-9]{7,15}$/',
                'max:15',
            ],
            'Genero' => 'required|in:M,F,O',
            'Direccion' => 'required|string|max:100',
        ];
    }

    /**
     * Método para verificar si el RUN es válido.
     */
    private function isValidRUT($rut): bool
    {
        // Verificar longitud mínima
        if (strlen($rut) < 3) {
            return false;
        }

        // Eliminar puntos y guion
        $rut = str_replace(['.', '-'], '', $rut);

        // Asegurar que el RUT tenga al menos un número y un dígito verificador
        if (!is_numeric(substr($rut, 0, -1)) || strlen($rut) < 2) {
            return false;
        }

        $number = substr($rut, 0, -1); // El número (sin el dígito verificador)
        $verifier = strtoupper(substr($rut, -1)); // El dígito verificador (letra o número)

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
        $allowedDomains = ['gmail.com', 'gmail.cl', 'outlook.com', 'hotmail.com', 'yahoo.com', 'yahoo.cl', 'outlook.cl', 'hotmail.cl', 'virginiogomez.cl'];
        $domain = substr(strrchr($email, "@"), 1);

        return in_array($domain, $allowedDomains);
    }
}
