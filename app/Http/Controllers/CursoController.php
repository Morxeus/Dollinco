<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $cursos = Curso::paginate(10);

        return view('curso.index', compact('cursos'))
            ->with('i', ($request->input('page', 1) - 1) * $cursos->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $curso = new Curso();

        return view('curso.create', compact('curso'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(CursoRequest $request): RedirectResponse
    {
        Curso::create($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso creado exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IDCurso): View
    {
        $curso = Curso::find($IDCurso);

        return view('curso.show', compact('curso'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IDCurso): View
    {
        $curso = Curso::find($IDCurso);

        return view('curso.edit', compact('curso'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(CursoRequest $request, Curso $curso): RedirectResponse
    {
        $curso->update($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IDCurso): RedirectResponse
    {
        try {
            $curso = Curso::findOrFail($IDCurso);

            // Verificar manualmente relaciones (opcional, si no se maneja en el modelo)
            if (
                $curso->cursoAsignaturas()->exists() ||
                $curso->cursoOfrecidos()->exists() ||
                $curso->matriculas()->exists() ||
                $curso->mallas()->exists()
            ) {
                return Redirect::route('cursos.index')
                    ->with('error', 'No se puede eliminar el curso porque tiene registros relacionados en otras tablas.');
            }

            $curso->delete();

            return Redirect::route('cursos.index')
                ->with('success', 'Curso eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('cursos.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el curso: ' . $e->getMessage());
        }
    }
}
