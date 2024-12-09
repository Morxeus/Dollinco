<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Malla;

class RegistroclaseRequest extends FormRequest
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
            'IdMalla' =>  ['required', 'exists:mallas,IdMalla'],
            'FechaClase' => ['required', 'date'],
            'DescripcionClase' =>  ['required', 'string', 'max:255'], 
        ];
    }
    

    public function loadRelatedData()
    {
        // Obtener todos los cursos
        $mallas = Malla::all();

        return compact('mallas');
    }
}