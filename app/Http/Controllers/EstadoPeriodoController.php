<?php

namespace App\Http\Controllers;

use App\Models\EstadoPeriodo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoPeriodoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoPeriodoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $estadoPeriodos = EstadoPeriodo::paginate(10);

        return view('estado-periodo.index', compact('estadoPeriodos'))
            ->with('i', ($request->input('page', 1) - 1) * $estadoPeriodos->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $estadoPeriodo = new EstadoPeriodo();

        return view('estado-periodo.create', compact('estadoPeriodo'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(EstadoPeriodoRequest $request): RedirectResponse
    {
        EstadoPeriodo::create($request->validated());

        return Redirect::route('estado-periodos.index')
            ->with('success', 'Estado de periodo creado exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id): View
    {
        $estadoPeriodo = EstadoPeriodo::find($id);

        return view('estado-periodo.show', compact('estadoPeriodo'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($id): View
    {
        $estadoPeriodo = EstadoPeriodo::find($id);

        return view('estado-periodo.edit', compact('estadoPeriodo'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(EstadoPeriodoRequest $request, EstadoPeriodo $estadoPeriodo): RedirectResponse
    {
        $estadoPeriodo->update($request->validated());

        return Redirect::route('estado-periodos.index')
            ->with('success', 'Estado de periodo actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $estadoPeriodo = EstadoPeriodo::findOrFail($id);

            // Verificar si tiene relaciones antes de eliminar
            if ($estadoPeriodo->periodos()->exists()) {
                return Redirect::route('estado-periodos.index')
                    ->with('error', 'No se puede eliminar el estado de periodo porque tiene relación con otros campos.');
            }

            $estadoPeriodo->delete();

            return Redirect::route('estado-periodos.index')
                ->with('success', 'Estado de periodo eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('estado-periodos.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el estado de periodo: ' . $e->getMessage());
        }
    }
}
