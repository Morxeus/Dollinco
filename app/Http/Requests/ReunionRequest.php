<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReunionRequest extends FormRequest
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
            'TipoReunion' => 'required.',
            'FechaInicio' => 'required|date_format:Y-m-d\TH:i', // Validación para datetime-local
            'FechaFin' => 'required|date_format:Y-m-d\TH:i',   // Validación para datetime-local
            'DescripcionReunion' => 'nullable|string|max:255',
            'RunProfesor' => 'required',
        ];
    }
    
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Convertir las fechas al formato de Carbon
            $fechaInicio = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $this->FechaInicio);
            $fechaFin = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $this->FechaFin);
    
            // Validar que la fecha (sin hora) sea igual
            if ($fechaInicio->toDateString() !== $fechaFin->toDateString()) {
                $validator->errors()->add('FechaFin', 'La fecha de inicio debe ser igual a la fecha de fin. Solo puede variar la hora.');
            }
        });
    }
}
