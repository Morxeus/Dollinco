<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\ProfesorDirector;
use App\Models\Malla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MallaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MallaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $cursoId = $request->input('IdCurso');
        $asignaturaId = $request->input('IdAsignatura');
        $query = Malla::query();
    
        if ($cursoId) {
            $query->where('IdCurso', $cursoId);
        }
    
        if ($asignaturaId) {
            $query->where('IdAsignatura', $asignaturaId);
        }
    
        $mallas = $query->paginate(10);
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
    
        return view('malla.index', compact('mallas', 'cursos', 'asignaturas'))
            ->with('i', ($request->input('page', 1) - 1) * $mallas->perPage());
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursos = Curso::all(); // Obtener todos los cursos
        $asignaturas = Asignatura::all(); // Obtener todas las asignaturas
        $matriculas = Matricula::whereNotIn('NumeroMatricula', function ($query) {
            $query->select('NumeroMatricula')->from('mallas');
        })->get(); // Obtener solo las matrículas no asociadas a una malla
        $profesores = ProfesorDirector::all(); // Obtener todos los profesores
    
        $malla = new Malla(); // Crear una nueva instancia de Malla
    
        return view('malla.create', compact('malla', 'cursos', 'asignaturas', 'matriculas', 'profesores'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(MallaRequest $request): RedirectResponse
    {
        $asignaturas = $request->input('IdAsignatura', []);
        foreach ($asignaturas as $asignaturaId) {
            Malla::create([
                'NombreMalla' => $request->validated('NombreMalla'),
                'IdCurso' => $request->validated('IdCurso'),
                'IdAsignatura' => $asignaturaId,
                'NumeroMatricula' => $request->validated('NumeroMatricula'),
                'RunProfesor' => $request->validated('RunProfesor'),
            ]);
        }
    
        return redirect()->route('mallas.index')
            ->with('success', 'Malla creada exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($IdMalla): View
    {
        $malla = Malla::find($IdMalla);

        return view('malla.show', compact('malla'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdMalla): View
    {
        $malla = Malla::findOrFail($IdMalla);
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $matriculas = Matricula::all(); // Obtener todas las matrículas
        $profesores = ProfesorDirector::all();
    
        return view('malla.edit', compact('malla', 'cursos', 'asignaturas', 'matriculas', 'profesores'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(MallaRequest $request, Malla $malla): RedirectResponse
    {
        Malla::where('IdCurso', $request->validated('IdCurso'))->delete();

        // Crear nuevas asignaturas
        $asignaturas = $request->input('IdAsignatura', []);
        foreach ($asignaturas as $asignaturaId) {
            Malla::create([
                'NombreMalla' => $request->validated('NombreMalla'),
                'IdCurso' => $request->validated('IdCurso'),
                'IdAsignatura' => $asignaturaId,
                'NumeroMatricula' => $request->validated('NumeroMatricula'),
                'RunProfesor' => $request->validated('RunProfesor'),
            ]);
        }
    
        return redirect()->route('mallas.index')
            ->with('success', 'Malla actualizada exitosamente.');
    }

    public function destroy($IdMalla): RedirectResponse
    {
        try {
            $malla = Malla::findOrFail($IdMalla);
    
            if (
                $malla->registrosClases()->exists() ||
                $malla->reunionApoderados()->exists() ||
                $malla->matriculas()->exists()
            ) {
                // Si hay registros relacionados, redirigir con un mensaje de error
                return redirect()->route('mallas.index')
                    ->with('error', 'No se puede eliminar la malla porque tiene registros relacionados en otras tablas.');
            }
    
            $malla->delete();
    
                // Redirigir con un mensaje de éxito si se eliminó correctamente
                return redirect()->route('mallas.index')
                    ->with('success', 'Malla eliminada con éxito.');
            } catch (\Exception $e) {
                // Captura cualquier error inesperado
                return redirect()->route('mallas.index')
                    ->with('error', 'Ocurrió un error al intentar eliminar la malla.');
            }
    }}