<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MatriculaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\EstadoMatricula;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $matriculas = Matricula::paginate();

        return view('matricula.index', compact('matriculas'))
            ->with('i', ($request->input('page', 1) - 1) * $matriculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $matricula = new Matricula();
        $alumnos = Alumno::all();
        $apoderados = Apoderado::all();
        $estadoMatriculas = EstadoMatricula::all();

      
        return view('matricula.create', compact('matricula','alumnos','apoderados','estadoMatriculas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatriculaRequest $request): RedirectResponse
    {
        Matricula::create($request->validated());

        return Redirect::route('matriculas.index')
            ->with('success', 'Matricula created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($NumeroMatricula)
    {
        $matricula = Matricula::with(['alumno', 'apoderado', 'estadoMatricula'])->findOrFail($NumeroMatricula);
        return view('matricula.show', compact('matricula'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NumeroMatricula): View
    {
        $matricula = Matricula::find($NumeroMatricula);
        $alumnos = Alumno::all();
        $apoderados = Apoderado::all();
        $estadoMatriculas = EstadoMatricula::all();

        return view('matricula.edit', compact('matricula','alumnos','apoderados','estadoMatriculas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatriculaRequest $request, Matricula $matricula): RedirectResponse
    {
        $matricula->update($request->validated());

        return Redirect::route('matriculas.index')
            ->with('success', 'Matricula updated successfully');
    }

    public function destroy($NumeroMatricula): RedirectResponse
    {
        Matricula::find($NumeroMatricula)->delete();

        return Redirect::route('matriculas.index')
            ->with('success', 'Matricula deleted successfully');
    }

        //vista matricula prueba
        public function showAll(): View
        {
            // Obtener todas las matriculas con los datos de las tablas relacionadas
            $matriculas = Matricula::with(['alumno', 'apoderado', 'estadoMatricula'])->get();
        
            return view('detalles.listMatriculas', compact('matriculas'));
        }
        
        
        
        
        
        
 
}
