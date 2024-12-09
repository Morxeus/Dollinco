<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Curso;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\ProfesorDirector;

class MallaRequest extends FormRequest
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
            'NombreMalla' => ['required', 'string', 'max:50'],
            'IdCurso' => ['required', 'exists:cursos,IdCurso'],
            'IdAsignatura' => ['required', 'array'],
            'IdAsignatura.*' => ['exists:asignaturas,IDAsignatura'],
            'NumeroMatricula' => ['required', 'exists:matriculas,NumeroMatricula'],
            'RunProfesor' => ['required', 'exists:profesor_directors,RunProfesor'],
        ];
    }

    /**
     * Cargar los datos relacionados (Cursos, Asignaturas, Matrículas y Profesores) para usarlos en el controlador.
     */
    public function loadRelatedData()
    {
        // Obtener todos los cursos
        $cursos = Curso::all();

        // Obtener todas las asignaturas
        $asignaturas = Asignatura::all();

        // Obtener todas las matrículas
        $matriculas = Matricula::all();

        // Obtener todos los profesores
        $profesores = ProfesorDirector::all();

        return compact('cursos', 'asignaturas', 'matriculas', 'profesores');
    }}