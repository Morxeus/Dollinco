<?php

namespace App\Http\Controllers;

use App\Models\Malla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MallaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Curso;
use App\Models\Asignatura;
use App\Models\Matricula;

class MallaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Malla::with(['curso', 'asignatura']);
    
        // Filtro por Número de Matrícula
        if ($request->filled('numero_matricula')) {
            $query->where('NumeroMatricula', $request->numero_matricula);
        }
    
        // Filtro por Curso (usando el nombre del curso)
        if ($request->filled('curso')) {
            $query->whereHas('curso', function($q) use ($request) {
                $q->where('NombreCurso', 'like', '%' . $request->curso . '%');
            });
        }
    
        // Filtro por Asignatura (usando el nombre de la asignatura)
        if ($request->filled('asignatura')) {
            $query->whereHas('asignatura', function($q) use ($request) {
                $q->where('NombreAsignatura', 'like', '%' . $request->asignatura . '%');
            });
        }
    
        $mallas = $query->paginate();
    
        return view('malla.index', compact('mallas'))
            ->with('i', ($request->input('page', 1) - 1) * $mallas->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $malla = new Malla();
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $matriculas = Matricula::all();
    
        // Define selectedAsignaturas como un array vacío para la vista create
        $selectedAsignaturas = [];
    
        return view('malla.create', compact('malla', 'cursos', 'asignaturas', 'matriculas', 'selectedAsignaturas'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(MallaRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
    
        // Verifica si hay asignaturas seleccionadas
        if (!empty($validatedData['IDAsignatura'])) {
            foreach ($validatedData['IDAsignatura'] as $asignaturaId) {
                Malla::create([
                    'IDCurso' => $validatedData['IDCurso'],
                    'IDAsignatura' => $asignaturaId,
                    'NumeroMatricula' => $validatedData['NumeroMatricula'],
                ]);
            }
            return Redirect::route('mallas.index')
                ->with('success', 'Malla creada exitosamente con múltiples asignaturas seleccionadas.');
        }
    
        // Si no hay asignaturas seleccionadas, muestra un mensaje de error
        return Redirect::back()->withErrors(['IDAsignatura' => 'Debe seleccionar al menos una asignatura.']);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show($IDCursoAsignatura): View
    {
        // Cargar las relaciones 'curso', 'asignatura' y 'matricula' con el registro de malla
        $malla = Malla::with(['curso', 'asignatura', 'matricula'])->find($IDCursoAsignatura);
    
        return view('malla.show', compact('malla'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDCursoAsignatura): View
    {
        // Encontrar el registro específico de malla
        $malla = Malla::find($IDCursoAsignatura);
        
        // Obtener todos los registros de Malla que tienen el mismo curso y matrícula
        $mallas = Malla::where('IDCurso', $malla->IDCurso)
                        ->where('NumeroMatricula', $malla->NumeroMatricula)
                        ->get();
    
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $matriculas = Matricula::all();
    
        // Extraer los IDs de asignaturas de los registros relacionados
        $selectedAsignaturas = $mallas->pluck('IDAsignatura')->toArray();
    
        return view('malla.edit', compact('malla', 'cursos', 'asignaturas', 'matriculas', 'selectedAsignaturas'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(MallaRequest $request, $IDCursoAsignatura): RedirectResponse
    {
        $validatedData = $request->validated();
    
        // Obtener el registro original para acceder a IDCurso y NumeroMatricula
        $malla = Malla::find($IDCursoAsignatura);
    
        // Verificar que exista el registro de malla
        if (!$malla) {
            return Redirect::route('mallas.index')
                ->with('error', 'Malla no encontrada.');
        }
    
        // Eliminar todas las asignaturas actuales para este curso y matrícula
        Malla::where('IDCurso', $malla->IDCurso)
             ->where('NumeroMatricula', $malla->NumeroMatricula)
             ->delete();
    
        // Insertar las nuevas asignaciones de asignaturas
        if (!empty($validatedData['IDAsignatura'])) {
            foreach ($validatedData['IDAsignatura'] as $asignaturaId) {
                Malla::create([
                    'IDCurso' => $malla->IDCurso,
                    'IDAsignatura' => $asignaturaId,
                    'NumeroMatricula' => $malla->NumeroMatricula,
                ]);
            }
        }
    
        return Redirect::route('mallas.index')
            ->with('success', 'Malla actualizada exitosamente con las asignaturas seleccionadas.');
    }
    

    public function destroy($IDCursoAsignatura): RedirectResponse
    {
        Malla::find($IDCursoAsignatura)->delete();

        return Redirect::route('mallas.index')
            ->with('success', 'Malla deleted successfully');
    }
}
