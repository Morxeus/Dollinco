<?php

namespace App\Http\Controllers;

use App\Models\Registroclase;
use App\Models\Malla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroclaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegistroclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registroclases = Registroclase::paginate(10);

        return view('registroclase.index', compact('registroclases'))
            ->with('i', ($request->input('page', 1) - 1) * $registroclases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mallas = Malla::with('asignatura')->get();
        $registroclase = new Registroclase();
        return view('registroclase.create', compact('registroclase','mallas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistroclaseRequest $request): RedirectResponse
    {
        // Crear el nuevo registro
        $registroclase = Registroclase::create([
            'IdMalla' => $request->validated('IdMalla'),
            'FechaClase' => $request->validated('FechaClase'),
            'DescripcionClase' => $request->validated('DescripcionClase'),
        ]);
    
        // Redirigir a la vista 'show' con el 'IdRegistroClases'
        return redirect()->route('registroclases.index', ['registroclase' => $registroclase->IdRegistroClases])
                         ->with('success', 'Registro de la clase creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IdRegistroClases): View
    {
        $registroclase = Registroclase::find($IdRegistroClases);

        return view('registroclase.show', compact('registroclase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdRegistroClases): View
    {
        // Obtener el registro existente con el ID proporcionado
        $registroclase = Registroclase::findOrFail($IdRegistroClases);
        
        // Obtener todas las mallas disponibles
        $mallas = Malla::all();
    
        // Devolver la vista de edición con el registro y las mallas
        return view('registroclase.edit', compact('registroclase', 'mallas'));
    }

    
    public function update(RegistroclaseRequest $request, Registroclase $registroclase): RedirectResponse
    {
        // Actualizar los campos del registroclase
        $registroclase->update([
            'IdMalla' => $request->validated('IdMalla'),  // Actualiza el IdMalla con el valor del formulario
            'FechaClase' => $request->validated('FechaClase'),  // Actualiza la fecha de la clase
            'DescripcionClase' => $request->validated('DescripcionClase'),  // Actualiza la descripción
        ]);
    
        // Redirigir a la vista 'show' con un mensaje de éxito
        return redirect()->route('registroclases.index', $registroclase->IdRegistroClases)
                         ->with('success', 'Registro de la clase actualizado exitosamente.');
    }

    public function destroy($IdRegistroClases): RedirectResponse
    {
        try {
            $registroclase = Registroclase::findOrFail($IdRegistroClases);
    
            // Verificar manualmente relaciones (opcional, si no se maneja en el modelo)
            if ($registroclase->malla()->exists()) {
                return Redirect::route('registroclases.index')
                    ->with('error', 'No se puede eliminar el registro de clase porque está relacionado con una malla.');
            }
    
            $registroclase->delete();
    
            return Redirect::route('registroclases.index')
                ->with('success', 'Registro de clase eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('registroclases.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el registro de clase: ' . $e->getMessage());
        }
    }
    
}
