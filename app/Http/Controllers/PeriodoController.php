<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PeriodoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\EstadoPeriodo;

class PeriodoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $periodos = Periodo::paginate();

        return view('periodo.index', compact('periodos'))
            ->with('i', ($request->input('page', 1) - 1) * $periodos->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $periodo = new Periodo();
        $estados = EstadoPeriodo::all(); // Obtener todos los registros de estado_periodos

        return view('periodo.create', compact('periodo', 'estados'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(PeriodoRequest $request): RedirectResponse
    {
        Periodo::create($request->validated());

        return Redirect::route('periodos.index')
            ->with('success', 'Periodo creado exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id): View
    {
        $periodo = Periodo::find($id);

        return view('periodo.show', compact('periodo'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($id): View
    {
        $periodo = Periodo::find($id);
        $estados = EstadoPeriodo::all(); // Obtener todos los registros de estado_periodos

        return view('periodo.edit', compact('periodo', 'estados'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(PeriodoRequest $request, Periodo $periodo): RedirectResponse
    {
        $periodo->update($request->validated());

        return Redirect::route('periodos.index')
            ->with('success', 'Periodo actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $periodo = Periodo::findOrFail($id);

            // Verificar relaciones manualmente, si no se manejan en el modelo
            if ($periodo->estadoPeriodo()->exists()) {
                return Redirect::route('periodos.index')
                    ->with('error', 'No se puede eliminar el periodo porque tiene un estado relacionado.');
            }

            $periodo->delete();

            return Redirect::route('periodos.index')
                ->with('success', 'Periodo eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('periodos.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el periodo: ' . $e->getMessage());
        }
    }
}
