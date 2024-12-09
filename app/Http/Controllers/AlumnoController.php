<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AlumnoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AlumnoController extends Controller
{

    // public function __construct()
    // {
    //     // Agregar middleware para proteger las acciones del controlador
    //     $this->middleware('permission:ver alumnos')->only(['index', 'show']);
    //     $this->middleware('permission:crear alumnos')->only(['create', 'store']);
    //     $this->middleware('permission:editar alumnos')->only(['edit', 'update']);
    //     $this->middleware('permission:eliminar alumnos')->only(['destroy']);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtén el valor del filtro desde la solicitud
        $runAlumno = $request->input('RunAlumno');
        
        // Filtra los registros si se proporciona un RunAlumno, de lo contrario, devuelve todos los alumnos
        $query = Alumno::query();
        if ($runAlumno) {
            $query->where('RunAlumno', 'like', '%' . $runAlumno . '%');
        }
        
        // Pagina los registros de alumnos con 10 elementos por página
        $alumnos = $query->paginate(10);
        
        // Calcula el índice inicial según la página actual
        $i = ($request->input('page', 1) - 1) * $alumnos->perPage();
        
        // Retorna la vista con los datos de alumnos y el índice inicial
        return view('alumno.index', compact('alumnos', 'i', 'runAlumno'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $alumno = new Alumno();

        return view('alumno.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlumnoRequest $request): RedirectResponse
    {
        Alumno::create($request->validated());

        return Redirect::route('alumnos.index')
            ->with('success', 'Alumno creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($RunAlumno): View
    {
        // Buscar alumno usando RunAlumno como clave primaria
        $alumno = Alumno::findOrFail($RunAlumno); // Cambiado para usar RunAlumno
        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($RunAlumno): View
    {
        // Buscar alumno usando RunAlumno como clave primaria
        $alumno = Alumno::findOrFail($RunAlumno); // Cambiado para usar RunAlumno
        return view('alumno.edit', compact('alumno'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(AlumnoRequest $request, Alumno $alumno): RedirectResponse
    {
        $alumno->update($request->validated());

        return Redirect::route('alumnos.index')
            ->with('success', 'Alumno se actualizó correctamente');
    }

    public function destroy($RunAlumno): RedirectResponse
    {
        try {
            // Buscar alumno usando RunAlumno como clave primaria
            $alumno = Alumno::findOrFail($RunAlumno);
    
            // Verificar si el alumno tiene registros relacionados
            if ($alumno->matriculas()->exists()) {
                // Redirigir con un mensaje de error si hay registros relacionados
                return Redirect::route('alumnos.index')
                    ->with('error', 'No se puede eliminar el alumno porque tiene registros relacionados en la tabla de matrículas.');
            }
    
            // Si no hay registros relacionados, eliminar el alumno
            $alumno->delete();
    
            // Redirigir con un mensaje de éxito
            return Redirect::route('alumnos.index')
                ->with('success', 'Alumno eliminado correctamente.');
        } catch (\Exception $e) {
            // Manejar errores inesperados
            return Redirect::route('alumnos.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el alumno.');
        }
    }
    
}