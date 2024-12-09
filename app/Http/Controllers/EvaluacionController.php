<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EvaluacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EvaluacionController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $evaluacions = Evaluacion::paginate();

        return view('evaluacion.index', compact('evaluacions'))
            ->with('i', ($request->input('page', 1) - 1) * $evaluacions->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $evaluacion = new Evaluacion();

        return view('evaluacion.create', compact('evaluacion'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(EvaluacionRequest $request): RedirectResponse
    {
        Evaluacion::create($request->validated());

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluación creada exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IdEvaluacion): View
    {
        $evaluacion = Evaluacion::find($IdEvaluacion);

        return view('evaluacion.show', compact('evaluacion'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IdEvaluacion): View
    {
        $evaluacion = Evaluacion::find($IdEvaluacion);

        return view('evaluacion.edit', compact('evaluacion'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(EvaluacionRequest $request, Evaluacion $evaluacion): RedirectResponse
    {
        $evaluacion->update($request->validated());

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluación actualizada exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IdEvaluacion): RedirectResponse
    {
        Evaluacion::find($IdEvaluacion)->delete();

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluación eliminada exitosamente.');
    }
}
