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
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        // Obtén los valores de los filtros desde la solicitud
        $numeroMatricula = $request->input('NumeroMatricula');
        $runAlumno = $request->input('RunAlumno');
        $estadoMatricula = $request->input('EstadoMatricula');

        // Query base con relaciones necesarias
        $query = Matricula::with(['alumno', 'apoderado', 'estadoMatricula']);

        // Filtro por Número de Matrícula
        if ($numeroMatricula) {
            $query->where('NumeroMatricula', 'like', '%' . $numeroMatricula . '%');
        }

        // Filtro por Run de Alumno
        if ($runAlumno) {
            $query->whereHas('alumno', function ($q) use ($runAlumno) {
                $q->where('RunAlumno', 'like', '%' . $runAlumno . '%');
            });
        }

        // Filtro por Estado de Matrícula
        if ($estadoMatricula) {
            $query->where('IDMatriculaEstado', $estadoMatricula);
        }

        // Obtener estados de matrícula para el filtro
        $estadosMatricula = EstadoMatricula::all();

        // Paginación
        $matriculas = $query->paginate(10);

        return view('matricula.index', compact('matriculas', 'estadosMatricula'))
            ->with('i', ($request->input('page', 1) - 1) * $matriculas->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $matricula = new Matricula();
        $alumnos = Alumno::all();
        $apoderados = Apoderado::all();
        $estadoMatriculas = EstadoMatricula::all();

        return view('matricula.create', compact('matricula', 'alumnos', 'apoderados', 'estadoMatriculas'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(MatriculaRequest $request): RedirectResponse
    {
        $data = $request->validated();
    
        // Verificar si ya existe una matrícula con el mismo alumno y diferente apoderado
        $exists = Matricula::where('RunAlumno', $data['RunAlumno'])
            ->where('RunApoderado', '!=', $data['RunApoderado'])
            ->exists();
    
        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['RunAlumno' => 'Este alumno ya está matriculado con otro apoderado.']);
        }
    
        // Crear la matrícula
        Matricula::create($data);
    
        return Redirect::route('matriculas.index')
            ->with('success', 'Matrícula creada exitosamente.');
    }
    
    /**
     * Muestra el recurso especificado.
     */
    public function show($NumeroMatricula)
    {
        $matricula = Matricula::with(['alumno', 'apoderado', 'estadoMatricula'])->findOrFail($NumeroMatricula);
        return view('matricula.show', compact('matricula'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($NumeroMatricula): View
    {
        $matricula = Matricula::find($NumeroMatricula);
        $alumnos = Alumno::all();
        $apoderados = Apoderado::all();
        $estadoMatriculas = EstadoMatricula::all();

        return view('matricula.edit', compact('matricula', 'alumnos', 'apoderados', 'estadoMatriculas'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(MatriculaRequest $request, Matricula $matricula): RedirectResponse
    {
        $data = $request->validated();
    
        // Verificar si ya existe una matrícula con el mismo alumno y diferente apoderado
        $exists = Matricula::where('RunAlumno', $data['RunAlumno'])
            ->where('RunApoderado', '!=', $data['RunApoderado'])
            ->where('NumeroMatricula', '!=', $matricula->NumeroMatricula) // Excluir la matrícula actual
            ->exists();
    
        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['RunAlumno' => 'Este alumno ya está matriculado con otro apoderado.']);
        }
    
        // Actualizar la matrícula
        $matricula->update($data);
    
        return Redirect::route('matriculas.index')
            ->with('success', 'Matrícula actualizada correctamente.');
    }
    
    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($NumeroMatricula): RedirectResponse
    {
        try {
            $matricula = Matricula::findOrFail($NumeroMatricula);

            // Verificar si tiene relaciones antes de eliminar
            if ($matricula->mallas()->exists()) {
                return Redirect::route('matriculas.index')
                    ->with('error', 'No se puede eliminar la matrícula porque tiene registros relacionados en la tabla Mallas.');
            }

            $matricula->delete();

            return Redirect::route('matriculas.index')
                ->with('success', 'Matrícula eliminada correctamente.');
        } catch (\Exception $e) {
            return Redirect::route('matriculas.index')
                ->with('error', 'Ocurrió un error al intentar eliminar la matrícula: ' . $e->getMessage());
        }
    }

    /**
     * Muestra todas las matrículas con los datos relacionados.
     */
    public function showAll(): View
    {
        // Obtener todas las matrículas con los datos de las tablas relacionadas
        $matriculas = Matricula::with(['alumno', 'apoderado', 'estadoMatricula'])->get();

        return view('detalles.listMatriculas', compact('matriculas'));
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        $data = $this->all();

        // Verificar si ya existe una matrícula con el mismo alumno y diferente apoderado
        $query = Matricula::where('RunAlumno', $data['RunAlumno'])
            ->where('RunApoderado', '!=', $data['RunApoderado']);

        // Si es una actualización, excluir la matrícula actual
        if ($this->route('matricula')) {
            $query->where('NumeroMatricula', '!=', $this->route('matricula')->NumeroMatricula);
        }

        if ($query->exists()) {
            $validator->errors()->add('RunAlumno', 'Este alumno ya está matriculado con otro apoderado.');
        }
    });
}

}
