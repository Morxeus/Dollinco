<?php

namespace App\Http\Controllers;

use App\Models\EstadoMatricula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoMatriculaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoMatriculaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $estadoMatriculas = EstadoMatricula::paginate();

        return view('estado-matricula.index', compact('estadoMatriculas'))
            ->with('i', ($request->input('page', 1) - 1) * $estadoMatriculas->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $estadoMatricula = new EstadoMatricula();

        return view('estado-matricula.create', compact('estadoMatricula'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(EstadoMatriculaRequest $request): RedirectResponse
    {
        EstadoMatricula::create($request->validated());

        return Redirect::route('estado-matriculas.index')
            ->with('success', 'Estado de matrícula creado exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IDMatriculaEstado): View
    {
        $estadoMatricula = EstadoMatricula::find($IDMatriculaEstado);

        return view('estado-matricula.show', compact('estadoMatricula'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IDMatriculaEstado): View
    {
        $estadoMatricula = EstadoMatricula::find($IDMatriculaEstado);

        return view('estado-matricula.edit', compact('estadoMatricula'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(EstadoMatriculaRequest $request, EstadoMatricula $estadoMatricula): RedirectResponse
    {
        $estadoMatricula->update($request->validated());

        return Redirect::route('estado-matriculas.index')
            ->with('success', 'Estado de matrícula actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IDMatriculaEstado): RedirectResponse
    {
        try {
            $estadoMatricula = EstadoMatricula::findOrFail($IDMatriculaEstado);

            // Verificar si tiene relaciones antes de eliminar
            if ($estadoMatricula->matriculas()->exists()) {
                return Redirect::route('estado-matriculas.index')
                    ->with('error', 'No se puede eliminar el estado de matrícula porque tiene matrículas relacionadas.');
            }

            $estadoMatricula->delete();

            return Redirect::route('estado-matriculas.index')
                ->with('success', 'Estado de matrícula eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('estado-matriculas.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el estado de matrícula: ' . $e->getMessage());
        }
    }
}
