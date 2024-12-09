<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReunionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ProfesorDirector;

class ReunionController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $reunions = Reunion::paginate(10);

        return view('reunion.index', compact('reunions'))
            ->with('i', ($request->input('page', 1) - 1) * $reunions->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $reunion = new Reunion();
        $profesores = ProfesorDirector::all();

        return view('reunion.create', compact('reunion', 'profesores'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(ReunionRequest $request): RedirectResponse
    {
        Reunion::create($request->validated());

        return Redirect::route('reunions.index')
            ->with('success', 'Reunión creada exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IdReunion): View
    {
        $reunion = Reunion::find($IdReunion);
        $profesores = ProfesorDirector::all();

        return view('reunion.show', compact('reunion', 'profesores'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IdReunion): View
    {
        $reunion = Reunion::find($IdReunion);
        $profesores = ProfesorDirector::all();

        return view('reunion.edit', compact('reunion', 'profesores'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(ReunionRequest $request, Reunion $reunion): RedirectResponse
    {
        $reunion->update($request->validated());

        return Redirect::route('reunions.index')
            ->with('success', 'Reunión actualizada exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IdReunion): RedirectResponse
    {
        try {
            $reunion = Reunion::findOrFail($IdReunion);

            // Verificar relaciones manualmente (opcional, si no se maneja en el modelo)
            if ($reunion->reunionApoderados()->exists()) {
                return Redirect::route('reunions.index')
                    ->with('error', 'No se puede eliminar la reunión porque tiene registros relacionados en la tabla de ReunionApoderado.');
            }

            $reunion->delete();

            return Redirect::route('reunions.index')
                ->with('success', 'Reunión eliminada exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('reunions.index')
                ->with('error', 'Ocurrió un error al intentar eliminar la reunión: ' . $e->getMessage());
        }
    }
}
