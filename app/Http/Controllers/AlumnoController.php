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
        $alumnos = Alumno::paginate();

        return view('alumno.index', compact('alumnos'))
            ->with('i', ($request->input('page', 1) - 1) * $alumnos->perPage());
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
        // Buscar alumno usando RunAlumno como clave primaria
        $alumno = Alumno::findOrFail($RunAlumno);
        $alumno->delete(); // Eliminar el alumno
    
        return Redirect::route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente');
    }
}
