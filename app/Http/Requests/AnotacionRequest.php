<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnotacionRequest extends FormRequest
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

            'TipoAnotacion' => 'required|string|in:Positiva,Positiva (Curso),Negativa,Negativa (Curso)',
            'Fecha' => 'required|date',
            'Descripcion' => 'required|string|max:500',
        ];
    }
    
}