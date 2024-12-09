<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsistenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsistenciaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $asistencias = Asistencia::paginate(10);

        return view('asistencia.index', compact('asistencias'))
            ->with('i', ($request->input('page', 1) - 1) * $asistencias->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $asistencia = new Asistencia();

        return view('asistencia.create', compact('asistencia'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(AsistenciaRequest $request): RedirectResponse
    {
        Asistencia::create($request->validated());

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia creada exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IDAsistencia): View
    {
        $asistencia = Asistencia::find($IDAsistencia);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IDAsistencia): View
    {
        $asistencia = Asistencia::find($IDAsistencia);

        return view('asistencia.edit', compact('asistencia'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(AsistenciaRequest $request, $IDAsistencia): RedirectResponse
    {
        $asistencia = Asistencia::findOrFail($IDAsistencia); // Buscar asistencia
        $asistencia->update($request->validated()); // Actualizar
    
        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia actualizada exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IDAsistencia): RedirectResponse
    {
        try {
            $asistencia = Asistencia::findOrFail($IDAsistencia);
    
            // Verificar si tiene registros relacionados
            if ($asistencia->detalleRegistroClases()->exists()) {
                return Redirect::route('asistencias.index')
                    ->with('error', 'No se puede eliminar la asistencia porque tiene registros relacionados en la tabla RegistrosdeClase.');
            }
    
            $asistencia->delete();
    
            return Redirect::route('asistencias.index')
                ->with('success', 'Asistencia eliminada exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('asistencias.index')
                ->with('error', 'Ocurrió un error al intentar eliminar la asistencia: ' . $e->getMessage());
        }
    }
    
}
