<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaturaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaturas = Asignatura::paginate(10);

        return view('asignatura.index', compact('asignaturas'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaturas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignatura = new Asignatura();

        return view('asignatura.create', compact('asignatura'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaturaRequest $request): RedirectResponse
    {
        Asignatura::create($request->validated());
    
        return Redirect::route('asignaturas.index')
            ->with('success', 'Asignatura creada exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($IDAsignatura): View
    {
        $asignatura = Asignatura::find($IDAsignatura);

        return view('asignatura.show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDAsignatura): View
    {
        $asignatura = Asignatura::find($IDAsignatura);

        return view('asignatura.edit', compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaturaRequest $request, Asignatura $asignatura): RedirectResponse
    {
        $asignatura->update($request->validated());
    
        return Redirect::route('asignaturas.index')
            ->with('success', 'Asignatura actualizada con éxito');
    }
    

    public function destroy($IDAsignatura): RedirectResponse
    {
        try {
            $asignatura = Asignatura::findOrFail($IDAsignatura);
    
            // Verificar si tiene relaciones en la tabla 'mallas'
            if ($asignatura->malla()->exists()) {
                return Redirect::route('asignaturas.index')
                    ->with('error', 'No se puede eliminar la asignatura porque tiene registros relacionados en la tabla mallas.');
            }
    
            // Eliminar la asignatura si no tiene relaciones
            $asignatura->delete();
    
            return Redirect::route('asignaturas.index')
                ->with('success', 'Asignatura eliminada exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('asignaturas.index')
                ->with('error', 'Ocurrió un error al intentar eliminar la asignatura: ' . $e->getMessage());
        }
    }
    
}