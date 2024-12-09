<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
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

			'RunAlumno' => 'required|string|max:12',
			'RunApoderado' => 'required|string|max:12',
			'FechaInscripcion' => 'required|date|after_or_equal:today',
			'IDMatriculaEstado' => 'required|numeric',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $fechaInscripcion = $this->input('FechaInscripcion');

            if ($fechaInscripcion) {
                $añoActual = now()->year;
                $añoFecha = date('Y', strtotime($fechaInscripcion));

                // Validar que el año no sea superior al año actual
                if ($añoFecha > $añoActual) {
                    $validator->errors()->add('FechaInscripcion', 'El año de la fecha de inscripción no puede ser superior al año actual.');
                }
            }
        });
    }
}
