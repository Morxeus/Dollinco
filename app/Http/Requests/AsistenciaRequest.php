<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
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
        $id = $this->route('IDAsistencia') ?? $this->route('asistencia'); // Asegurarte de capturar el parámetro correctamente
    
        return [
            'EstadoAsistencia' => 'required|string|max:10|unique:asistencias,EstadoAsistencia,' . $id . ',IDAsistencia', // Excluye el registro actual
        ];
    }
    
}
